<?php

namespace App\Http\Controllers;

use App\Page;
use App\BackSlider;
use App\Gallery;
use App\GalleryImages;
use App\GalleryVideos;
use App\HandoverProjects;
use App\Mail\SendMail;
use App\Management;
use App\Post;
use App\Project;
use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index()
    {
        $data = (object) [
            'title' => 'Home',
            'sliders' => BackSlider::where('is_active', 1)->orderBy('position', 'asc')->get(),
            'services' => Services::where('status', 1)->get(),
            'ongoings' => Project::OnGoingProjects()->get(),
            'upcomming' => Project::UpCommingProjects()->get(),
            'readys' => Project::ReadyProjects()->get(),
            'comfortable' => Page::findOrFail(2),
            'wanted' => Page::findOrFail(3),
            'posts' => Post::latest()->take(10)->get(),
            'video1' => GalleryVideos::where('vgallery_id', 2)->get()->first(),
            'video2' => GalleryVideos::where('vgallery_id', 2)->get()->last()
            // 'videos' => GalleryVideos::where('vgallery_id', 2)->get(),
            // 'images' => GalleryImages::where('gallery_id', 1)->get(),
        ];

        // return $data;
        return view('front_end.public.home', compact('data'));
        // return view('front_end.new_design.pages.home', compact('data'));
    }

    public function ReadyList()
    {
        $data = (object) [
            'title' => 'Ready Flats',
            'projects' => Project::ReadyProjects()->get(),
        ];

        return view('front_end.public.project_list', compact('data'));
        // return view('front_end.new_design.pages.ready-flat', compact('data'));
    }

    public function UpCommingList()
    {
        $data = (object) [
            'title' => 'Up Coming Projects',
            'projects' => Project::UpCommingProjects()->get(),
        ];

        return view('front_end.public.project_list', compact('data'));
    }

    public function OngoingList()
    {
        $data = (object) [
            'title' => 'Ongoing Projects',
            'projects' => Project::OnGoingProjects()->where('is_active',1)->get(),
        ];

        return view('front_end.public.project_list', compact('data'));
    }

    public function HandOverProjects()
    {
        $data = (object) [
            'title' => 'Handover Projects',
            'projects' => HandoverProjects::orderBy('sort_number','asc')->get(),
        ];
        // return $data;
        return view('front_end.public.handover', compact('data'));
        // return view('front_end.new_design.pages.hand-over-projects', compact('data'));
    }

    public function AllProjects()
    {
        $data = (object) [
            'title' => 'All Projects',
            'ongoings' => Project::OnGoingProjects()->get(),
            'upcomming' => Project::UpCommingProjects()->get(),
            'readys' => Project::ReadyProjects()->get(),
        ];

        return view('front_end.new_design.pages.all-projects', compact('data'));
    }

    public function ContactUs()
    {
        $data = (object) [
            'title' => 'Contact Us',
        ];

        return view('front_end.public.contactus', compact('data'));
        // return view('front_end.new_design.pages.contact-us', compact('data'));
    }

    public function ContactUsPost(Request $request)
    {

        $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        );

        // Mail::to('assorthousing@gmail.com')->send(new SendMail($data));
        // Mail::to('mahfuz.wit@gmail.com')->send(new SendMail($data));

        return back();
    }

    public function PhotoGallery()
    {
        $data = (object) [
            'title' => 'Photo Gallery',
            'gallerys' => Gallery::with(['images'])->where('type','general')->get()
        ];
        // return $data;
        return view('front_end.public.photo_gallery', compact('data'));
        // return view('front_end.new_design.pages.gallery', compact('data'));
    }

    public function interiorGallery()
    {
        $data = (object) [
            'title' => 'Interior Design Gallery',
            'gallerys' => Gallery::with(['images'])->where('type','interior')->get()
        ];
        // return $data;
        return view('front_end.public.photo_gallery', compact('data'));
        // return view('front_end.new_design.pages.gallery', compact('data'));
    }
    public function VideoGallery()
    {
        $data = (object) [
            'title' => 'Video Gallery',
            'videos' => GalleryVideos::paginate(12),
        ];

        return view('front_end.new_design.pages.video-gallery', compact('data'));
    }

    public function ClientGallery()
    {
        $data = (object) [
            'title' => 'Client Quotes',
            'posts' => Post::where('status', 1)->get(),
        ];

        return view('front_end.public.quotes', compact('data'));
    }

    public function ProjectDetails($id)
    {
        $project = Project::with(['floor_plans', 'images', 'videos'])->find($id);
        $releted_projects = Project::where('status',$project->status)->get();
        $data = (object) [
            'title' => 'Project Details',
            'project' => $project,
            'releted_projects' => $releted_projects,
        ];
        // return $data;
        return view('front_end.public.project_details', compact('data'));
        // return view('front_end.new_design.pages.project-details', compact('data'));
    }

    public function AboutUs()
    {
        $data = (object) [
            'title' => 'About Us',
            'managements' => Management::all(),
            'page1' => Page::findOrFail(4),
            'page2' => Page::findOrFail(5),
            'services' => Page::where('category_id', 3)->get(),
        ];
        // return $data;
        return view('front_end.public.aboutus', compact('data'));
        // return view('front_end.new_design.pages.about-us', compact('data'));
    }


    public function LandWanted()
    {
        $data = (object) [
            'title' => 'Land Wanted',
            'wanted' => Page::findOrFail(3),
        ];

        return view('front_end.public.land_wanted', compact('data'));
    }
    public function disclaimerPage()
    {
        $data = (object) [
            'title' => 'Disclaimer',
            'disclaimer' => Page::findOrFail(9),
        ];

        return view('front_end.public.disclaimer', compact('data'));
    }
}
