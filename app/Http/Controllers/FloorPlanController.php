<?php

namespace App\Http\Controllers;

use App\Project;
use App\FloorPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FloorPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function list(Project $project) {

        $data = (object) [
            'title' => ' - Project Floor Plan Image',
            'project' => $project,
            'project_floors_plans' => FloorPlan::where('project_id', $project->id)->get(),
        ];

        return view('dashboard.project_fplanlist', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // validate
        $request->validate([
            'project_id' => 'required',
            'image' => 'required|image',
        ]);

        $image = new FloorPlan();
        $image->project_id = $request->project_id;

        // upload project Image
        if ($request->hasfile('image')) {
            $path = $request->file('image')->store('/public/project/images');
            $path = explode('/', $path);
            $path = end($path);

            $image->image = $path;
        }
        // save data

        $image->save();

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FloorPlan  $floorPlan
     * @return \Illuminate\Http\Response
     */
    public function show(FloorPlan $floorPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FloorPlan  $floorPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(FloorPlan $floorPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FloorPlan  $floorPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FloorPlan $floorPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FloorPlan  $floorPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(FloorPlan $floorPlan)
    {
        if (isset($floorPlan->image) && !empty($floorPlan->image)) {
            $file = public_path('storage/project/images/' . $floorPlan->image);
            if (File::exists($file)) {
                unlink($file);
            }
        }

        $floorPlan->delete();

        return back();

    }

    public function dzone(Request $request)
    {

        $pimage = new FloorPlan();
        $pimage->project_id = $request->project_id;

        if ($request->hasfile('file')) {
            $path = $request->file('file')->store('/public/project/images');
            $path = explode('/', $path);
            $path = end($path);

            $pimage->image = $path;
        }

        $pimage->save();

        return response()->json(['success' => $path]);

    }

}
