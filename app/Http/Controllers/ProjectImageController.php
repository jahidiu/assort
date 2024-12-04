<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectImageController extends Controller
{

    function list(Project $project) {
        $data = (object) [
            'title' => ' - Project Image',
            'project' => $project,
            'project_images' => ProjectImage::where('project_id', $project->id)->get(),
        ];

        return view('dashboard.project_imagelist', compact('data'));
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

        $image = new ProjectImage();
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
     * @param  \App\ProjectImage  $projectImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectImage $projectImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectImage  $projectImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectImage $projectImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectImage  $projectImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectImage $projectImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectImage  $projectImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectImage $projectImage)
    {

        if (isset($projectImage->image) && !empty($projectImage->image)) {
            $file = public_path('storage/project/images/' . $projectImage->image);
            if (File::exists($file)) {
                unlink($file);
            }
        }

        $projectImage->delete();

        return back();
    }

    public function dzone(Request $request)
    {
        
        $pimage = new ProjectImage();
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
