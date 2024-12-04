<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ServicesController extends Controller
{
    public function index()
    {
        
        $service        = Services::paginate(10);
        $count          = Services::count();
        // $publish        = Services::where('status','=','1')->count();
        // $unpublish      = Services::where('status','=','0')->count();

        $data = [

            'title'     => 'Service List',
            'service'      => $service,
            'count'     => $count,
           /*  'publish'   => $publish,
            'unpublish' => $unpublish */
       ];

       $data = ( object ) $data;

       return view('dashboard.all_service_list', compact('data'));

    }

    public function search(Request $request)
    {

        if (!check(3, 1, session('permissions'))) {

            return abort(404);
        }

        $key = $request->key;


        $Services = Services::Where('title', 'LIKE', '%' . $key . '%')
            ->orwhere('description', 'LIKE', '%' . $key . '%')
            ->paginate(10);

        $count  = Services::count();
        // $publish    = Services::where('status','=','1')->count();
        // $unpublish  = Services::where('status','=','0')->count();


        $data = [
            'title'     => '- Service List',
            'Services'      => $Services,
            'count'     => $count,
            /* 'publish'   => $publish,
            'unpublish' => $unpublish */
        ];

        $data = (object)$data;

        return view('dashboard.all_service_list', compact(['data']));
    }

    public function create()
    {
        $data = [

            'title'     => 'Add Service',
        ];

        $data = (object) $data;

        return view('dashboard.add_new_service', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'title'    => 'required',
            'editor1'       => 'required',
            'image'         => 'mimes:jpeg,jpg,bmp,png',
            'status'        => 'required'
        ]);

        $service    = new Services();

        $service->title        = $request->title;
        $service->description  = $request->editor1;
        $service->icon         = $request->image;
        $service->status       = $request->status;


        if ($request->hasfile('image')) {
            $path = $request->file('image')->store('/public/service_image/');
            $path = explode('/', $path);
            $path = end($path);
            $service->icon = $path;
        }

        $service->save();

        Session::flash('message', 'Successfully Added in Your Service');
        Session::flash('class_name', 'alert-success');

        return redirect()->route('service.index');
    }

    public function post_permission($id)
    {
        $service_stat = Services::findorFail($id);

        $service_stat->toogle_status();

        return back();
    }

    public function edit($id)
    {
        $service = Services::findOrFail($id);

         $data =[
            'title'     => '- Service Edit',
            'service'      => $service
        ];

        $data = (object)$data;

        return view('dashboard.edit_service', compact(['data']));

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

            'title'    => 'required',
            'editor1'       => 'required',
            'image'         => 'mimes:jpeg,jpg,bmp,png',
            'status'        => 'required'
       ]);

        $service               = Services::findOrFail($id);
        $service->title        = $request->title;
        $service->description  = $request->editor1;
        $service->status       = $request->status;

        if ( $request->hasfile( 'image' ) ) {

                if(isset($service->feature_image) && !empty($service->feature_image)){
                $image = public_path('storage/service_image/'.$service->feature_image);


                if(File::exists($image)){
                    Storage::delete('/public/service_image/'.$service->feature_image);
                    }
                }

                $path = $request->file( 'image' )->store( '/public/service_image/' );
                $path = explode( '/', $path );
                $path = end( $path );
                $service->icon = $path;
            } 

            $service->save();

            Session::flash('message','Successfully Update in Your SErvice');
            Session::flash('class_name','alert-primary');

            return redirect()->route('service.index')->with('success','Pages Data is Added');  
    }

    public function destroy($id)
    {
         
        $service = Services::findOrFail($id);
        $service->delete();

        if(isset($service->icon) && !empty($service->icon)){
            // delete user image
            $image = public_path('storage/service$service_image/'.$service->icon);
            //dd($image);
            if(File::exists($image)){
                unlink( $image );
            }
        }

        Session::flash('message','Successfully Delete in Your Service');
        Session::flash('class_name','alert-danger');

        return back();
    }
}
