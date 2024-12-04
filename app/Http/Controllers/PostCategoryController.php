<?php

namespace App\Http\Controllers;

use App\Postcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(!check(15,1, session('permissions'))){
 
            return abort(404);
        }

       $categories = Postcategory::whereNull('category_id')
            ->with('childrenCategories')
            ->get();

        $allCategories = Postcategory::all();

        $count  = Postcategory::count();

        $data = [

            'title'         => 'Post Category List',
            'categories'    => $categories,
            'allcategories' => $allCategories,
            'count'         => $count
        ];

        $data  = (object) $data;

        return view('dashboard.post_category_list', compact('data'));
    }

    public function search(Request $request){

        $key = $request->key;

        $categories = Postcategory::Where('name','LIKE','%'.$key.'%')
            ->with('childrenCategories')
            ->get();

        $allCategories = Postcategory::all();

        $count = Postcategory::count();

       $data =[

            'title'         => '- Page Category Search',
            'categories'    => $categories,
            'allcategories' => $allCategories,
            'count'         => $count,
        ];

        $data = (object) $data;

        return view('dashboard.post_category_list', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

            'name' => 'required',
       ]);

        $category = new Postcategory;

        $category->name         = $request->name;
        $category->category_id  = $request->category_id;

        $category->save();

        Session::flash('message','Successfully Added in Your Category');
        Session::flash('class_name','alert-success');

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
        //
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

            'name'  => 'required',
       ]);

        $category = Postcategory::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        Session::flash('message','Successfully Update in Your Category');
        Session::flash('class_name','alert-primary');

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
        $category = Postcategory::findOrFail($id);
        $category->delete();

        Session::flash('message','Successfully Deleted in Your Category');
        Session::flash('class_name','alert-danger');
        return back();
    }
}
