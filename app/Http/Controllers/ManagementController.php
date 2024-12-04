<?php

namespace App\Http\Controllers;

use App\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = (object)[
            'title' => ' - Managements',
            'managements' => Management::all(),
        ];

        return view('dashboard.management_list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = (object)[
            'title' => ' - Managements',
        ];

        return view('dashboard.add_management_project', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        validate form
        // $request->validate([
        //     'name' => 'required',
        //     'designation' => 'required',
        //     'description' => 'required',
        //     'email' => 'required|email',
        //     'image' => 'required|image',
        // ]);

//        upload image
        if ($request->hasfile('image')) {
            $path = $request->file('image')->store('/public/management/image');
            $path = explode('/', $path);
            $path = end($path);
        }

//        store data
        Management::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'description' => $request->description,
            'email' => $request->email,
            'image' => $path,
        ]);

//
//       return
        return redirect(route('management.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Management $management
     * @return \Illuminate\Http\Response
     */
    public function show(Management $management)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Management $management
     * @return \Illuminate\Http\Response
     */
    public function edit(Management $management)
    {
        $data = (object)[
            'title' => ' - Managements',
            'management' => $management,
        ];

        return view('dashboard.edit_management_project', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Management $management
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Management $management)
    {
        //        validate form
        // $request->validate([
        //     'name' => 'required',
        //     'designation' => 'required',
        //     'description' => 'required',
        //     'email' => 'required|email',
        //     'image' => 'image',
        // ]);


        if ($request->hasfile('image')) {

            if (isset($management->image) && !empty($management->image)) {
                $file = public_path('storage/management/image/' . $management->image);
                if (File::exists($file)) {
                    unlink($file);
                }
            }

            $path = $request->file('image')->store('/public/management/image');
            $path = explode('/', $path);
            $path = end($path);
        }else{
            $path = $management->image;
        }


        $management->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'description' => $request->description,
            'email' => $request->email,
            'image' => $path,
        ]);

//
//       return
        return redirect(route('management.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Management $management
     * @return \Illuminate\Http\Response
     */
    public function destroy(Management $management)
    {
//        delete image
        if (isset($management->image) && !empty($management->image)) {
            $file = public_path('storage/management/image/' . $management->image);
            if (File::exists($file)) {
                unlink($file);
            }
        }

        $management->delete();

        return back();
    }
}
