<?php

namespace App\Http\Controllers;

use App\Pagecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PagecategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function search(Request $request){

        $key = $request->key;

        $categories = Pagecategory::Where('name','LIKE','%'.$key.'%')
            ->with('childrenCategories')
            ->get();

        $allCategories = Pagecategory::all();

        $count = Pagecategory::count();

       $data =[

            'title'         => '- Page Category Search',
            'categories'    => $categories,
            'allcategories' => $allCategories,
            'count'         => $count,
        ];

        $data = (object)$data;

        return view('dashboard.page_category', compact(['data']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       if(!check(15,1, session('permissions'))){
 
            return abort(404);
        }

       $categories = Pagecategory::whereNull('category_id')
            ->with('childrenCategories')
            ->get();

        $allCategories = Pagecategory::all();

        $count = Pagecategory::count();

       $data =[

            'title'         => '- Page Category',
            'categories'    => $categories,
            'allcategories' => $allCategories,
            'count'         => $count,
        ];

        $data = (object)$data;

        return view('dashboard.page_category', compact(['data']));
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

        $category = new Pagecategory;

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

        $category   = Pagecategory::findOrFail($id);

         $data =[

            'title'     => '- Page Category Edit',
            'category'  => $category
        ];

        $data = (object)$data;

        return view('dashboard.edit_page_category', compact(['data']));
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

        $category = Pagecategory::findOrFail($id);
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
        $category = Pagecategory::findOrFail($id);
        $category->delete();

        Session::flash('message','Successfully Deleted in Your Category');
        Session::flash('class_name','alert-danger');
        return back();
    }
}
