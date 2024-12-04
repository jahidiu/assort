<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Menulist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(!check(24,1, session('permissions'))){

            return abort(404);
        }

        $allmenus   = Menu::paginate(10);
        $count      = Menu::count();

         $data =[

            'title'     => '- Menu Position List',
            'allmenus'  => $allmenus,
            'count'     => $count
        ];

        $data = (object)$data;

        return view('dashboard.menu_position_list', compact(['data']));
    }

    public function search(Request $request)
    {

        if(!check(3,1, session('permissions'))){

            return abort(404);
        }

        $key = $request->key;

        $allmenus = Menu::Where('name','LIKE','%'.$key.'%')
        ->paginate(10);

        $count      = Menu::count();

        $data =[
            
            'title'     => '- Menu Search',
            'allmenus'  => $allmenus,
            'count'     => $count
        ];

        $data = (object)$data;

        return view('dashboard.menu_position_list', compact(['data']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name'      => 'required'
       ]);

        $menu    = new Menu();

        $menu->name             = $request->name;
       
        Session::flash('message','Successfully Added in Your Menu');
        Session::flash('class_name','alert-success');

        $menu->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!check(24,1, session('permissions'))){

            return abort(404);
        }

        $menu = Menulist::whereNull('parent_id')
        ->Where('menu_id',$id)
        ->with('childrenMenus')
        ->get();

        $menu_id    = Menu::findOrFail($id);
        $menus      = Menulist::Where('menu_id',$id)->get();
        $count      = Menulist::Where('menu_id',$id)->count();

         $data =[

            'title'         => '- Menu List',
            'menu_id'       => $menu_id,
            'menus'         => $menus,
            'menu'          => $menu,
            'count'         => $count
        ];

        //dd($data);

        $data = (object)$data;

        return view('dashboard.menu_list', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        Session::flash('message','Successfully Deleted in Your Menu');
        Session::flash('class_name','alert-danger');
        return back();
    }
}
