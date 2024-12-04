<?php

namespace App\Http\Controllers;

use App\BackSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BackSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $slider = Backslider::paginate(10);

        $data = [
            'title' => '- Slider List',
            'sliders' => $slider
        ];

        $data = (object) $data;

        return view('dashboard.slider_list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        if (!check(9, 2, session('permissions'))) {

            return abort(404);
        }

        $data = [
            'title' => '- Add Slider'
        ];

        $data = (object) $data;

        return view('dashboard.add_new_slider', compact('data'));
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
            's_img' => 'nullable|image|mimes:jpg,png,bmp,jpeg,gif',
            'video' => 'nullable|mimetypes:video/avi,video/mpeg,video/x-matroska,video/mp4,video/quicktime|max: 20480'

        ]);

        $slider = new BackSlider();

        $isactive = isset($request->is_active) ? 1 : 0;

        $slider->is_active = $isactive;
        $slider->text1 = $request->text1;
        $slider->text2 = $request->text2;

        if ($request->hasfile('s_img')) {
            $path = $request->file('s_img')->store('/public/slider/image');
            $path = explode('/', $path);
            $path = end($path);
            $slider->image = $path;
        }

        if ($request->hasfile('video')) {
            $path = $request->file('video')->store('/public/videogallery/video');
            $path = explode('/', $path);
            $path = end($path);
            $slider->video = $path;
        }

        $slider->save();

        Session::flash('message', 'Successfully Added in Your Slider');
        Session::flash('class_name', 'alert-success');

        return redirect('/kt-admin/slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BackSlider  $backSlider
     * @return \Illuminate\Http\Response
     */

    public function show(BackSlider $backSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BackSlider  $backSlider
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $slider = BackSlider::findorFail($id);

        $data = [
            'title' => '- Edit Slider',
            'slider' => $slider
        ];

        $data = (object) $data;

        return view('dashboard.edit_slider', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BackSlider  $backSlider
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            's_img' => 'nullable|image|mimes:jpg,png,bmp,jpeg,gif',
            'video' => 'nullable|mimetypes:video/avi,video/mpeg,video/x-matroska,video/mp4,video/quicktime|max: 20480'
        ]);

        $slider = BackSlider::findorFail($id);

        $isactive = isset($request->is_active) ? 1 : 0;

        $slider->is_active = $isactive;
        $slider->text1 = $request->text1;
        $slider->text2 = $request->text2;

        if ($request->hasfile('s_img')) {

            // delete old image
            if (isset($slider->image) && !empty($slider->image)) {
                $image = public_path('storage/slider/image/' . $slider->image);

                if (File::exists($image)) {
                    unlink($image);
                }
            }

            // upload new image
            $path = $request->file('s_img')->store('/public/slider/image');
            // Storage::disk('local')->put($request->file('s_img'), 'Contents');
            $path = explode('/', $path);
            $path = end($path);
            $slider->image = $path;
        }
        if ($request->hasfile('video')) {
            // delete old video
            if (isset($slider->video) && !empty($slider->video)) {
                $video = public_path('storage/videogallery/video/' . $slider->video);

                if (File::exists($video)) {
                    unlink($video);
                }
            }
            // upload new video
            if ($request->hasfile('video')) {
                $path = $request->file('video')->store('/public/videogallery/video');
                $path = explode('/', $path);
                $path = end($path);
                $slider->video = $path;
            }
        }

        $slider->save();

        Session::flash('message', 'Successfully Update in Your Slider');
        Session::flash('class_name', 'alert-primary');

        return redirect('/kt-admin/slider');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BackSlider  $backSlider
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        // delete slider
        $slider = BackSlider::findOrFail($id);
        $slider->delete();

        if (isset($slider->image) && !empty($slider->image)) {
            // delete slider image
            $image = public_path('storage/slider/image/' . $slider->image);
            if (File::exists($image)) {
                unlink($image);
            }
        }

        Session::flash('message', 'Successfully Deleted in Your Slider');
        Session::flash('class_name', 'alert-danger');

        return back();
    }


    public function sliderstatus($id)
    {

        $slider = BackSlider::findorFail($id);

        if ($slider->is_active != 1) {
            $slider->is_active = 1;
        } else {
            $slider->is_active = 0;
        }
        $slider->save();

        return back();
    }


    public function updateorder(Request $request)
    {
        if ($request->has('ids')) {
            $arr = explode(',', $request->input('ids'));

            foreach ($arr as $sortOrder => $id) {
                $slider = BackSlider::find($id);
                $slider->position = $sortOrder;
                $slider->save();
            }
            return response()->json(['success' => true, 'message' => 'Updated']);
        }
    }
}
