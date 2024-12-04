<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectVideo;
use Illuminate\Http\Request;

class ProjectVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function list(Project $project) {

        $data = (object) [
            'title' => ' - Project Videos',
            'project' => $project,
            'project_videos' => ProjectVideo::where('project_id', $project->id)->get(),
        ];

        return view('dashboard.project_videolist', compact('data'));

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

        $request->validate([
            'project_id' => 'required',
            'url' => 'required',
        ]);

        $project_video = new ProjectVideo();
        $project_video->project_id = $request->project_id;
        $project_video->url = $request->url;
        $project_video->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectVideo  $projectVideo
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectVideo $projectVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectVideo  $projectVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectVideo $projectVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectVideo  $projectVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectVideo $projectVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectVideo  $projectVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectVideo $projectVideo)
    {
        $projectVideo->delete();
        return back();
    }
}
