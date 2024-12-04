<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Events\UserLogout;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $guardName = 'admin';
    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    protected $loginRoute;

    public function __construct()
    {
        // $this->middleware('guest:admin')->except('AdminLogout');
        // $this->loginRoute = route('admin.login');
    }

    public function getLogin()
    {
        $data = (object)[
            'title' => 'Login'
        ];
        return view('admin.auth.login', compact('data'));
    }

    public function postLogout()
    {
        Auth::guard($this->guardName)->logout();
        Session::flush();
        // return redirect()->guest($this->loginRoute);
        return redirect()->guest(route('admin.login'));
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }


        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (Auth::guard($this->guardName)->attempt($credential)) {

            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->route('admin_dashboard');
        } else {
            $this->incrementLoginAttempts($request);

            return redirect()->back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);
        }
    }

    public function register_view()
    {
        $data = [
            'title' => 'Register'
        ];

        $data = (object)$data;

        return view('admin.auth.register', compact('data'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:password_confirmation',
            'password_confirmation' => 'required',
        ]);

        // default user settings data

        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_group = 1;
        $user->save();

        // $credential = [
        //     'email' => $user->email,
        //     'password' => $user->password
        // ];

        return redirect()->route('admin.login');
    }
}
