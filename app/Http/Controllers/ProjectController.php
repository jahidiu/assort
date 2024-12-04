<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = (object) [
        //     'title' => ' - Projects',
        // ];

        // return view('dashboard.project_list', compact('data'));
    }

    public function OnGoingList()
    {
        $data = (object) [
            'title' => ' - Ongoing Projects',
            'page_header' => 'Ongoing Project List',
            'projects' => Project::OnGoingProjects()->get(),
        ];

        return view('dashboard.project_list', compact('data'));
    }

    public function UpCommingList()
    {
        $data = (object) [
            'title' => ' - Up Coming Projects',
            'page_header' => 'Up Coming Project List',
            'projects' => Project::UpCommingProjects()->get(),
        ];

        return view('dashboard.project_list', compact('data'));
    }

    public function ReadyList()
    {
        $data = (object) [
            'title' => ' - Ready Projects',
            'page_header' => 'Ready Project List',
            'projects' => Project::ReadyProjects()->get(),
        ];

        return view('dashboard.project_list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = (object) [
            'title' => ' - Projects',
        ];

        return view('dashboard.add_project', compact('data'));
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
            "title" => "required",
            'description'   => 'nullable',
            "address" => "nullable",
            "type_of_project" => "nullable",
            "built_up_area" => "nullable",
            "number_of_floors" => "nullable",
            "apartment_floor" => "nullable",
            "size" => "nullable",
            "bedroom" => "nullable",
            "bathroom" => "nullable",
            "collection" => "nullable",
            "launch_date" => "nullable",
            "completion_date" => "nullable",
            "status" => "required",
            "sort_number" => "nullable",
            "iframe_code" => "nullable",
            "featured_image" => "required|image|mimes:jpeg,png,jpg,gif,svg",
            "brochure" => "nullable|mimes:pdf",
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->address = $request->address;
        $project->type_of_project = $request->type_of_project;
        $project->built_up_area = $request->built_up_area;
        $project->number_of_floors = $request->number_of_floors;
        $project->apartment_floor = $request->apartment_floor;
        $project->size = $request->size;
        $project->bedroom = $request->bedroom;
        $project->bathroom = $request->bathroom;
        $project->collection = $request->collection;
        $project->launch_date = $request->launch_date;
        $project->completion_date = $request->completion_date;
        $project->status = $request->status;
        $project->sort_number = $request->sort_number;
        $project->iframe_code = $request->iframe_code;
        $project->is_active = $request->has('is_active') ? 1 : 0;

        // upload Featured Image

        if ($request->hasfile('featured_image')) {
            $path = $request->file('featured_image')->store('/public/project/images');
            $path = explode('/', $path);
            $path = end($path);

            $project->featured_image = $path;
        }

        // upload borochure
        if ($request->hasfile('brochure')) {
            $path = $request->file('brochure')->store('/public/project/brochures');
            $path = explode('/', $path);
            $path = end($path);

            $project->brochure = $path;
        }

        $project->save();

        if ($request->status==1) {
            return redirect(route('project.ongoing'));
        }
        if ($request->status==2) {
            return redirect(route('project.upcomming'));
        }
        if ($request->status==3) {
            return redirect(route('project.ready'));
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $data = (object) [
            'title' => ' - Projects',
            'project' => $project,
        ];

        return view('dashboard.project_details', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $data = (object) [
            'title' => ' - Projects',
            'project' => $project,
        ];

        return view('dashboard.edit_project', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

        $request->validate([
            "title" => "required",
            'description'   => 'nullable',
            "address" => "nullable",
            "type_of_project" => "nullable",
            "built_up_area" => "nullable",
            "number_of_floors" => "nullable",
            "apartment_floor" => "nullable",
            "size" => "nullable",
            "bedroom" => "nullable",
            "bathroom" => "nullable",
            "collection" => "nullable",
            "launch_date" => "nullable",
            "completion_date" => "nullable",
            "status" => "required",
            "sort_number" => "nullable",
            "iframe_code" => "nullable",
            "featured_image" => "image",
            "brochure" => "mimes:pdf",
        ]);

        $project->title = $request->title;
        $project->description = $request->description;
        $project->address = $request->address;
        $project->type_of_project = $request->type_of_project;
        $project->built_up_area = $request->built_up_area;
        $project->number_of_floors = $request->number_of_floors;
        $project->apartment_floor = $request->apartment_floor;
        $project->size = $request->size;
        $project->bedroom = $request->bedroom;
        $project->bathroom = $request->bathroom;
        $project->collection = $request->collection;
        $project->launch_date = $request->launch_date;
        $project->completion_date = $request->completion_date;
        $project->status = $request->status;
        $project->sort_number = $request->sort_number;
        $project->iframe_code = $request->iframe_code;
        $project->is_active = $request->has('is_active') ? 1 : 0;

        // upload Featured Image

        if ($request->hasfile('featured_image')) {

            if (isset($project->featured_image) && !empty($project->featured_image)) {
                $file = public_path('storage/project/images/' . $project->featured_image);
                if (File::exists($file)) {
                    unlink($file);
                }
            }

            $path = $request->file('featured_image')->store('/public/project/images');
            $path = explode('/', $path);
            $path = end($path);

            $project->featured_image = $path;
        }

        // upload borochure
        if ($request->hasfile('brochure')) {

            if (isset($project->brochure) && !empty($project->brochure)) {
                $file = public_path('storage/project/brochures/' . $project->brochure);
                if (File::exists($file)) {
                    unlink($file);
                }
            }

            $path = $request->file('brochure')->store('/public/project/brochures');
            $path = explode('/', $path);
            $path = end($path);

            $project->brochure = $path;
        }

        $project->save();

        if ($request->status == 1) {
            return redirect(route('project.ongoing'));
        }
        if ($request->status == 2) {
            return redirect(route('project.upcomming'));
        }
        if ($request->status == 3) {
            return redirect(route('project.ready'));
        }

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        // delete feature image
        if (isset($project->featured_image) && !empty($project->featured_image)) {
            $file = public_path('storage/project/images/' . $project->featured_image);
            if (File::exists($file)) {
                unlink($file);
            }
        }

        // delete Brochure
        if (isset($project->brochure) && !empty($project->brochure)) {
            $file = public_path('storage/project/brochures/' . $project->brochure);
            if (File::exists($file)) {
                unlink($file);
            }
        }

        $project->delete();

        return back();

    }
}
