<?php

namespace App\Http\Controllers;

use App\HandoverProjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HandoverProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = (object) [
            'title' => ' - Handover Projects',
            'hprojects' => HandoverProjects::orderBy('sort_number','asc')->get()
        ];

        return view('dashboard.handover_project_list', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = (object) [
            'title' => ' - Add Handover Projects',
        ];

        return view('dashboard.add_handover_project', compact('data'));
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
            'name' => 'required',
            'address' => 'required',
            'no_of_flat' => 'required',
            'no_of_storied' => 'required',
            'handover_date' => 'required',
        ]);

        $path = null;
        if ($request->hasfile('image')) {
            $path = $request->file('image')->store('/public/project/images');
            $path = explode('/', $path);
            $path = end($path);
        }

        HandoverProjects::create([
            'name' => $request->name,
            'address' => $request->address,
            'image' => $path,
            'no_of_flat' => $request->no_of_flat,
            'no_of_storied' => $request->no_of_storied,
            'handover_date' => $request->handover_date,
            'sort_number' => $request->sort_number,
        ]);

        return redirect(route('handover-project.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HandoverProjects  $handoverProjects
     * @return \Illuminate\Http\Response
     */
    public function show(HandoverProjects $handoverProjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HandoverProjects  $handoverProjects
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = (object) [
            'title' => ' - Edit Handover Projects',
            'project' => HandoverProjects::findOrFail($id),
        ];

        return view('dashboard.edit_handover_project', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HandoverProjects  $handoverProjects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'no_of_flat' => 'required',
            'no_of_storied' => 'required',
            'handover_date' => 'required',
        ]);

        $handoverProjects = HandoverProjects::findOrFail($id);
        $handoverProjects->name = $request->name;
        $handoverProjects->address = $request->address;
        $handoverProjects->no_of_flat = $request->no_of_flat;
        $handoverProjects->no_of_storied = $request->no_of_storied;
        $handoverProjects->handover_date = $request->handover_date;
        $handoverProjects->sort_number = $request->sort_number;

        if ($request->hasfile('image')) {
            if (isset($handoverProjects->image) && !empty($handoverProjects->image)) {
                $file = public_path('storage/project/images/' . $handoverProjects->image);
                if (File::exists($file)) {
                    unlink($file);
                }
            }

            $path = $request->file('image')->store('/public/project/images');
            $path = explode('/', $path);
            $path = end($path);

            $handoverProjects->image = $path;
        }

        $handoverProjects->save();

        return redirect(route('handover-project.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HandoverProjects  $handoverProjects
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HandoverProjects::findOrFail($id)->delete();
        return redirect()->back();
    }
}
