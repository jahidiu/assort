<?php

namespace App\Http\Controllers;

use App\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class GeneralSettingsController extends Controller
{
    public function view()
    {

        if (!check(5, 1, session('permissions'))) {

            return abort(404);
        }

        $gsettings = GeneralSettings::findOrFail(1);

        $data = [
            'title' => '- General Settings',
            'gsettings' => $gsettings
        ];

        $data = (object)$data;

        return view('dashboard.general_settings', compact('data'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'site_name' => 'required|min:3',
            'site_title' => 'required|min:3',
            'short_info' => 'required|min:10',
            'footer_text' => 'required|min:3',
            'site_logo' => 'image|max:2048',
            'celebration_img' => 'image',
        ]);

        $gsettings = GeneralSettings::findOrFail(1);
        $gsettings->site_name = $request->site_name;
        $gsettings->site_title = $request->site_title;
        $gsettings->short_info = $request->short_info;
        $gsettings->footer_text = $request->footer_text;

        if ($request->hasfile('site_logo')) {
            if (isset($gsettings->site_logo) && !empty($gsettings->site_logo)) {
                // delete old image
                $image = public_path('storage/site/' . $gsettings->site_logo);
                if (File::exists($image)) {
                    unlink($image);
                }
            }
            // upload new image
            $path = $request->file('site_logo')->store('/public/site');
            $path = explode('/', $path);
            $path = end($path);
            $gsettings->site_logo = $path;
        }
        if ($request->hasfile('celebration_img')) {
            if (isset($gsettings->celebration_img) && !empty($gsettings->celebration_img)) {
                // delete old image
                $image = public_path('storage/site/' . $gsettings->celebration_img);
                if (File::exists($image)) {
                    unlink($image);
                }
            }
            // upload celebration image
            $path2 = $request->file('celebration_img')->store('/public/site');
            $path2 = explode('/', $path2);
            $path2 = end($path2);
            $gsettings->celebration_img = $path2;
        }
        $gsettings->save();

        Session::flash('message', 'Successfully Update in Your General Settings');
        Session::flash('class_name', 'alert-primary');

        return back();
    }
}
