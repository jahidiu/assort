<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Group;
use Carbon\Carbon;
use App\LogHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class BackUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = Admin::with('group')->paginate(10);

        $data = [
            'title' => '- User List',
            'users' => $users,
        ];

        $data = (object) $data;

        return view('dashboard.user_list', compact('data'));
    }

    public function search(Request $request)
    {

        $key = $request->key;

        $users = Admin::with('group')
            ->orWhere('email', 'LIKE', '%' . $key . '%')
            ->orWhere('fname', 'LIKE', '%' . $key . '%')
            ->orWhere('lname', 'LIKE', '%' . $key . '%')
            ->orWhere('uname', 'LIKE', '%' . $key . '%')
            ->paginate(10);

        $count = User::count();

        $data = [

            'title' => '- User List',
            'users' => $users,
            'count' => $count
        ];

        $data = (object) $data;

        return view('dashboard.user_list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!check(1, 2, session('permissions'))) {

            return abort(404);
        }


        $groups = Group::all();
        $data = [
            'title' => '- Add new user',
            'groups' => $groups
        ];

        $data = (object) $data;

        return view('dashboard.add_new_users', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => "required|min:3",
            'lname' => "required|min:3",
            'uname' => "required|min:3|unique:admins",
            'email' => "required|email|unique:admins",
            'password' => "required|min:6|same:password_confirmation",
            'password_confirmation' => "required",
            'profile_picture' => 'image|max:2048'
        ]);

        $user = new Admin();
        $user->name = $request->fname . ' ' . $request->lname;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->uname = $request->uname;
        $user->email = $request->email;
        $user->is_front = 0;
        $user->password = Hash::make($request->password);
        $user->user_group = $request->user_group;

        if ($request->hasfile('profile_picture')) {
            $path = $request->file('profile_picture')->store('/public/users/profile_img');
            $path = explode('/', $path);
            $path = end($path);
            $user->profile_picture = $path;
        } else {
            $user->profile_picture = null;
        }

        $user->save();

        Session::flash('message', 'Successfully Added in Your User');
        Session::flash('class_name', 'alert-success');

        return redirect('/kt-admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if ($id != Auth::user()->id) {
            return abort(404);
        }

        $user = User::with('group')->findorFail($id);

        $log = LogHistory::where('user_id', $id)->orderBy('id', 'desc')->skip(1)->take(1)->get();

        if ($log->count() > 0) {

            $login = Carbon::createFromTimestamp($log[0]->login_time)->toDateTimeString();
            $logout = Carbon::createFromTimestamp($log[0]->logout_time)->toDateTimeString();
        } else {

            $login = '';
            $logout = '';
        }

        $data = [
            'title' => $user->uname . 'Profile',
            'user' => $user,
            'login_time' => $login,
            'logout_time' => $logout
        ];

        $data = (object) $data;

        return view('dashboard.user_profile', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        $groups = Group::all();

        $data = [
            'title' => '- Edit User',
            'user' => $user,
            'groups' => $groups
        ];

        $data = (object) $data;

        return view('dashboard.edit_user', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => "required|min:3",
            'lname' => "required|min:3",
            'uname' => 'required|min:3|unique:admins,uname,' . $id,
            'email' => "required|email|unique:admins,email," . $id,
            'profile_picture' => 'image|max:2048'
        ]);

        $user = Admin::findorFail($id);
        $user->name = $request->fname . ' ' . $request->lname;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->uname = $request->uname;
        $user->email = $request->email;
        $user->is_front = 0;
        $user->password = Hash::make($request->password);
        $user->user_group = $request->user_group;

        if ($request->hasfile('profile_picture')) {

            // delete old image if have any
            if (isset($user->profile_picture) && !empty($user->profile_picture)) {
                $image = public_path('storage/users/profile_img/' . $user->profile_picture);
                if (File::exists($image)) {
                    unlink($image);
                }
            }

            // upload new image
            $path = $request->file('profile_picture')->store('/public/users/profile_img');
            $path = explode('/', $path);
            $path = end($path);
            $user->profile_picture = $path;
        }


        $user->save();

        Session::flash('message', 'Successfully Update In Your User');
        Session::flash('class_name', 'alert-primary');

        return redirect('kt-admin/user/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete user
        $user = Admin::findOrFail($id);
        $user->delete();

        if (isset($user->profile_picture) && !empty($user->profile_picture)) {
            // delete user image
            $image = public_path('storage/users/profile_img/' . $user->profile_picture);
            if (File::exists($image)) {
                unlink($image);
            }
        }

        Session::flash('message', 'Successfully Deleted In Your User');
        Session::flash('class_name', 'alert-danger');

        return back();
    }

    public function userstatus($id)
    {

        $user = Admin::findorFail($id);

        if ($user->status != 1) {
            $user->status = 1;
        } else {
            $user->status = 0;
        }
        $user->save();

        return back();
    }
}
