<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $post           = Post::paginate(10);
        $count          = Post::count();
        $publish        = Post::where('status','=','1')->count();
        $unpublish      = Post::where('status','=','0')->count();

        $data = [

            'title'     => 'Post List',
            'post'      => $post,
            'count'     => $count,
            'publish'   => $publish,
            'unpublish' => $unpublish
       ];

       $data = ( object ) $data;

       return view('dashboard.all_post_list', compact('data'));

    }

    public function search(Request $request)
    {

        if(!check(3,1, session('permissions'))){

            return abort(404);
        }

        $key = $request->key;


        $post = Post::Where('post_title','LIKE','%'.$key.'%')
        ->orwhere('post_description','LIKE','%'.$key.'%')
        ->paginate(10);

        $count  = Post::count();
        $publish    = Post::where('status','=','1')->count();
        $unpublish  = Post::where('status','=','0')->count();


        $data =[
            'title'     => '- Post List',
            'post'      => $post,
            'count'     => $count,
            'publish'   => $publish,
            'unpublish' => $unpublish
        ];

        $data = (object)$data;

        return view('dashboard.all_post_list', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [

            'title'     => 'Add Post',
       ];

       $data = ( object ) $data;

       return view('dashboard.add_new_post', compact('data'));
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

            'post_title'    => 'required',
            'editor1'       => 'required',
            'image'         => 'mimes:jpeg,jpg,bmp,png',
            'status'        => 'required',
            'rate'        => 'required|numeric|min:1|max:5'
       ]);

        $post    = new Post();

            $post->post_title           = $request->post_title;
            $post->post_description     = $request->editor1;
            $post->feature_image        = $request->image;
            $post->status               = $request->status;
            $post->rate               = $request->rate;


            if ( $request->hasfile( 'image' ) ) {
                $path = $request->file( 'image' )->store( '/public/post_image/' );
                $path = explode( '/', $path );
                $path = end( $path );
                $post->feature_image = $path;
            }

            $post->save();

            Session::flash('message','Successfully Added in Your Post');
            Session::flash('class_name','alert-success');

            return redirect()->route('post.index');
    }

    public function post_permission($id)
    {
        $post_stat = Post::findorFail($id);

        $post_stat->toogle_status();

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
        $post      = Post::findOrFail($id);
        //$category   = Pagecategory::all();

         $data =[

            'title'     => '- Post Edit',
            'post'      => $post,
            //'category'  => $category,
        ];

        $data = (object)$data;

        return view('dashboard.edit_post', compact(['data']));

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

            'post_title'    => 'required',
            'editor1'       => 'required',
            'image'         => 'mimes:jpeg,jpg,bmp,png',
            'status'        => 'required',
            'rate'        => 'required|numeric|min:1|max:5'
       ]);

        $post                       = Post::findOrFail($id);
        $post->post_title           = $request->post_title;
        $post->post_description     = $request->editor1;
        //$post->feature_image        = $request->image;
        $post->status               = $request->status; 
        $post->rate               = $request->rate; 

        if ( $request->hasfile( 'image' ) ) {

                if(isset($post->feature_image) && !empty($post->feature_image)){
                $image = public_path('storage/post_image/'.$post->feature_image);


                if(File::exists($image)){
                    Storage::delete('/public/post_image/'.$post->feature_image);
                    }
                }

                $path = $request->file( 'image' )->store( '/public/post_image/' );
                $path = explode( '/', $path );
                $path = end( $path );
                $post->feature_image = $path;
            } 

            $post->save();

            Session::flash('message','Successfully Update in Your Post');
            Session::flash('class_name','alert-primary');

            return redirect()->route('post.index')->with('success',
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
         
        $post = Post::findOrFail($id);
        $post->delete();

        if(isset($post->feature_image) && !empty($post->feature_image)){
            // delete user image
            $image = public_path('storage/post_image/'.$post->feature_image);
            //dd($image);
            if(File::exists($image)){
                unlink( $image );
            }
        }

        Session::flash('message','Successfully Delete in Your Post');
        Session::flash('class_name','alert-danger');

        return back();
    }
}
