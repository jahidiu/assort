<?php

namespace App\Http\Controllers;

use App\Menulist;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenulistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    public function search(Request $request)
    {

        if(!check(24,1, session('permissions'))){

            return abort(404);
        }

        $key = $request->key;
        $id  = $request->menu_id;

        $menu = Menulist::Where('name','LIKE','%'.$key.'%')
        ->Where('menu_id',$id)
        ->with('Menus')
        ->with('childrenMenus')
        ->get();

        //dd($menu);

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

            'name'      => 'required',
            'url'       => 'required'
       ]);

        $menu    = new Menulist();

        $menu->menu_id          = $request->menu_id;
        $menu->name             = $request->name;
        $menu->url              = $request->url;
        $menu->parent_id        = $request->parent_id;
       
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
        $this->validate($request,[

            'name'      => 'required',
            'url'       => 'required'
       ]);

        $menu = Menulist::findOrFail($id);
        $menu->name             = $request->name;
        $menu->url              = $request->url;

        Session::flash('message','Successfully Update in Your Menu');
        Session::flash('class_name','alert-primary');

        $menu->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menulist::findOrFail($id);
        $menu->delete();

        Session::flash('message','Successfully Deleted in Your Menu');
        Session::flash('class_name','alert-danger');
        return back();
    }

    public function multi_destroy($id){

        $menu = Menulist::find( $id );
        $menu->delete();

        Session::flash('message','Successfully Deleted in Your Manu');
        Session::flash('class_name','alert-danger');

        return response()->json([
            'success'=> "ok"
        ]);
    }

    public function updateOrder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));

            foreach($arr as $sortOrder => $id){
                $menu = Menulist::find($id);
                $menu->position = $sortOrder;
                $menu->save();
            }
            return response()->json(['success'=>true,'message'=>'Updated']);
        }
    }
}
