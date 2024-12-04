<?php

namespace App\Http\Controllers;

use App\VGallery;
use App\GalleryVideos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class GalleryVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function index( $id ) {

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function create() {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        if (!check(11, 2, session('permissions'))) {

            return abort(404);
        }

        $request->validate([
            'title' => 'required',
            'image' => 'image',
            'video_url' => 'required',
            'video' => 'nullable|mimetypes:video/avi,video/mpeg,video/x-matroska,video/mp4,video/quicktime|max: 20480',
        ]);

        $video = new GalleryVideos();
        $video->video_url = $request->video_url;

        if (isset($request->title) && !empty($request->title)) {
            $video->title = $request->title;
        } else {
            $video->title = $request->video->getClientOriginalName();
        }

        $video->description = $request->description;
        $video->vgallery_id = $request->vgallery_id;

        if ($request->hasfile('image')) {
            $path = $request->file('image')->store('/public/videogallery/image');
            $path = explode('/', $path);
            $path = end($path);
            $video->thumbnail = $path;
        }

        if ($request->hasfile('video')) {
            $path = $request->file('video')->store('/public/videogallery/video');
            $path = explode('/', $path);
            $path = end($path);
            $video->video = $path;
        }

        $video->save();

        Session::flash('message', 'Successfully Add in Your Video');
        Session::flash('class_name', 'alert-success');

        return back();
    }


    public function search(Request $request)
    {

        $key = $request->key;
        $id  = $request->id;

        $vgallery   = VGallery::findorFail($id);
        $videos     = GalleryVideos::where('title', 'LIKE', '%' . $key . '%')
            ->orWhere('description', 'LIKE', '%' . $key . '%')
            ->paginate(10);

        $count = GalleryVideos::count();

        $data = [

            'title'     => "- Gallery " . $vgallery->name,
            'vgallery'  => $vgallery,
            'videos'    => $videos,
            'count'     => $count
        ];

        $data = (object)$data;

        return view('dashboard.videos_list', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GalleryVideos  $galleryVideos
     * @return \Illuminate\Http\Response
     */

    // public function show( GalleryImages $galleryImages ) {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GalleryVideos  $galleryImages
     * @return \Illuminate\Http\Response
     */

    // public function edit( GalleryImages $galleryImages ) {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GalleryImages  $galleryImages
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'thumbnail' => 'image|max:2048',
            'video_url' => 'required'
        ]);

        $galleryVideos = GalleryVideos::find($id);
        $galleryVideos->title = $request->title;
        $galleryVideos->video_url = $request->video_url;
        $galleryVideos->description = $request->description;

        if ($request->hasfile('thumbnail')) {

            if (isset($galleryVideos->thumbnail) && !empty($galleryVideos->thumbnail)) {
                $thumbnail = public_path('storage/videogallery/image/' . $galleryVideos->thumbnail);
                if (File::exists($thumbnail)) {
                    Storage::delete($thumbnail);
                }
            }

            $path = $request->file('thumbnail')->store('/public/videogallery/image');
            $path = explode('/', $path);
            $path = end($path);

            $galleryVideos->thumbnail = $path;
        }

        $galleryVideos->save();

        Session::flash('message', 'Successfully Update in Your Video');
        Session::flash('class_name', 'alert-primary');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GalleryImages  $galleryImages
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $video = GalleryVideos::find($id);
        $hasThumbnail = isset($video->thumbnail) && !empty($video->thumbnail);



        if (isset($video->video) && !empty($video->video)) {
            // delete video
            $path = public_path('/storage/videogallery/video/' . $video->video);
            if (File::exists($path)) {
                unlink($path);
            }
        }

        if ($hasThumbnail) {
            // delete image
            $thumbnail = public_path('/storage/videogallery/image/' . $video->thumbnail);
            if (File::exists($thumbnail)) {
                Storage::delete($thumbnail);
                unlink($thumbnail);
            }
        }

        $video->delete();

        Session::flash('message', 'Successfully Deleted in Your Video');
        Session::flash('class_name', 'alert-danger');

        return back();
    }


    public function multi_destroy($id)
    {

        $video = GalleryVideos::find($id);
        $hasThumbnail = isset($video->thumbnail) && !empty($video->thumbnail);

        if (isset($video->video) && !empty($video->video)) {
            // delete video
            $path = public_path('/storage/videogallery/video/' . $video->video);
            if (File::exists($path)) {
                unlink($path);
            }
        }

        if ($hasThumbnail) {
            // delete image
            $thumbnail = public_path('/storage/videogallery/image/' . $video->thumbnail);
            if (File::exists($thumbnail)) {
                Storage::delete($thumbnail);
                unlink($thumbnail);
            }
        }

        $video->delete();

        Session::flash('message', 'Successfully Deleted in Your Video');
        Session::flash('class_name', 'alert-danger');

        return response()->json([
            'success' => "ok"
        ]);
    }



    public function dzonev(Request $request)
    {

        $request->validate([
            'file' => 'required|mimetypes:video/avi,video/mpeg,video/x-matroska,video/mp4,video/quicktime|max: 20480',
        ]);

        $path = $request->file('file')->store('/public/videogallery/video');
        $path = explode('/', $path);
        $path = end($path);

        $video = new GalleryVideos();

        $video->vgallery_id = $request->vgallery_id;
        $video->title = $request->file->getClientOriginalName();
        $video->video = $path;

        $video->save();

        return response()->json(['success' => $path]);

        // return back();
    }


    public function updateorder(Request $request)
    {
        if ($request->has('ids')) {
            $arr = explode(',', $request->input('ids'));

            foreach ($arr as $sortOrder => $id) {
                $video = GalleryVideos::find($id);
                $video->position = $sortOrder;
                $video->save();
            }
            return response()->json(['success' => true, 'message' => 'Updated']);
        }
    }
}
