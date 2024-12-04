<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!check(3,1, session('permissions'))){
 
            return abort(404);
        }

        $modules = Module::paginate(10);

        $data =[
            'title' => '- Module List',
            'modules' => $modules
        ];

        $data = (object)$data;

        return view('dashboard.module_list', compact(['data']));
    }

    public function search(Request $request)
    {

        if(!check(3,1, session('permissions'))){

            return abort(404);
        }

        $key = $request->key;


        $modules = Module::Where('module_name','LIKE','%'.$key.'%')
        ->paginate(10);

        $count  = Module::count();


        $data =[
            'title'     => '- Module List',
            'modules'   => $modules,
            'count'     => $count
        ];

        $data = (object)$data;

        return view('dashboard.module_list', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check(3,2, session('permissions'))){
 
            return abort(404);
        }

        $data =[
            'title' => '- Add Module'
        ];

        $data = (object)$data;

        return view('dashboard.add_new_modules', compact('data'));
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
            'module_name' => 'required|min:3'
        ]);

        $module = new Module();
        $module->module_name = $request->module_name;
        $module->save();

        Session::flash('message','Successfully Added in Your Module');
        Session::flash('class_name','alert-success');

        return redirect('/kt-admin/module');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::findOrFail($id);

        $data =[
            'title' => '- Edit Module',
            'module' => $module
        ];

        $data = (object)$data;

        return view('dashboard.edit_modules', compact('data'));
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
        $module = Module::findOrFail($id);
        $module->module_name = $request->module_name;
        $module->save();

        Session::flash('message','Successfully Update in Your Module');
        Session::flash('class_name','alert-primary');

        return redirect('/kt-admin/module');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        Session::flash('message','Successfully Deleted in Your Module');
        Session::flash('class_name','alert-danger');

        return redirect('/kt-admin/module');
    }
}
