<?php

namespace App\Http\Controllers;

use App\Page;
use App\Pagecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!check(8,1, session('permissions'))){

            return abort(404);
        }

        $pages = Page::paginate(10);

        //$published = Page::where('status', 1)->get()->count();
        // dd($published);

        $count = Page::count();

         $data =[
            'title' => '- Page List',
            'pages' => $pages,
            'count' => $count
        ];

        $data = (object)$data;

        return view('dashboard.all_pages_list', compact(['data']));
    }

    public function search(Request $request)
    {

        $key = $request->key;

        $pages = Page::where('page_name','LIKE','%'.$key.'%')
        ->orWhere('page_content','LIKE','%'.$key.'%')
        ->paginate(10);

        $count = Page::count();

        $data = [

            'title' => '- Page List',
            'pages' => $pages,
            'count' => $count
        ];

        $data = (object)$data;

        return view('dashboard.all_pages_list', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if(!check(8,2, session('permissions'))){

            return abort(404);
        }

          $categories = Pagecategory::whereNull('category_id')
            ->with('childrenCategories')
            ->get();

        $allCategories = Pagecategory::all();

          $data =[
            'title'     => '- New Page',
            'categories'    => $categories,
            'allcategories' => $allCategories,
        ];

        $data = (object)$data;

        return view('dashboard.add_new_pages', compact(['data']));
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

            'page_name' => 'required',
            // 'slug'      => 'unique:pages',
            'editor1'   => 'required',
            'status'    => 'required'
       ]);

       $page    = new Page();

            $page->page_name        = $request->page_name;
            $page->slug             = $request->slug;
            $page->category_id      = $request->category;
            $page->page_content     = $request->editor1;
            $page->feature_image    = $request->image;
            $page->thumbnail        = $request->thumbnail;
            $page->video            = $request->video;
            $page->status           = $request->status;


            if ( $request->hasfile( 'image' ) ) {
                $path = $request->file( 'image' )->store( '/public/pageimage/' );
                $path = explode( '/', $path );
                $path = end( $path );
                $page->feature_image = $path;
            }
            if ( $request->hasfile( 'thumbnail' ) ) {
                $path = $request->file( 'thumbnail' )->store( '/public/pageimage/' );
                $path = explode( '/', $path );
                $path = end( $path );
                $page->thumbnail = $path;
            }

            Session::flash('message','Successfully Added in Your Page');
            Session::flash('class_name','alert-success');

            $page->save();

            return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $pages      = Page::findOrFail($id);
        $category   = Pagecategory::all();

         $data =[
            'title'     => '- Page Edit',
            'pages'     => $pages,
            'category'  => $category,
        ];

        $data = (object)$data;

        return view('dashboard.edit_pages', compact(['data']));
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

            'page_name' => 'required',
            // 'slug'      => 'unique:pages,slug,'.$id,
            'editor1'   => 'required',
            'status'    => 'required'
       ]);

            $page                   = Page::findOrFail($id);
            $page->page_name        = $request->page_name;
            $page->slug             = $request->slug;
            $page->category_id      = $request->category;
            $page->page_content     = $request->editor1;
            // $page->feature_image = $request->image;
            // $page->thumbnail     = $request->thumbnail;
            $page->video            = $request->video;
            $page->status           = $request->status;


            if ( $request->hasfile( 'image' ) ) {

                if(isset($page->feature_image) && !empty($page->feature_image)){
                $image = public_path('storage/pageimage/'.$page->feature_image);

                if(File::exists($image)){
                    Storage::delete('/public/pageimage/'.$page->feature_image);
                    }
                }

                $path = $request->file( 'image' )->store( '/public/pageimage/' );
                $path = explode( '/', $path );
                $path = end( $path );
                $page->feature_image = $path;
            }

            if ( $request->hasfile( 'thumbnail' ) ) {

                if(isset($page->thumbnail) && !empty($page->thumbnail)){
                $thumbnail = public_path('storage/pagethumbnail/'.$page->thumbnail);

                if(File::exists($thumbnail)){
                    Storage::delete('/public/pageimage/'.$page->thumbnail);
                    }
                }

                $path = $request->file( 'thumbnail' )->store( '/public/pageimage/' );
                $path = explode( '/', $path );
                $path = end( $path );
                $page->thumbnail = $path;
            }

            $page->save();

            Session::flash('message','Successfully Update in Your Page');
            Session::flash('class_name','alert-primary');

            return redirect()->route('page.index')->with('success',
            'Pages Data is Added');
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
        $page = Page::findOrFail($id);
        $page->delete();

        if(isset($page->feature_image) && !empty($page->feature_image)){
            // delete user image
            $image = public_path('storage/pageimage/'.$page->feature_image);
            //dd($image);
            if(File::exists($image)){
                unlink( $image );
            }
        }

        Session::flash('message','Successfully Deleted in Your Page');
        Session::flash('class_name','alert-danger');

        return back();
    }
}

?>
