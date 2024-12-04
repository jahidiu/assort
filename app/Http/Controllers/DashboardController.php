<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Group;
use App\ShowReq;
use App\Properties;
use App\GalleryImages;
use App\GalleryVideos;
use App\UserPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $data = [
            'title' => ' - Dashboard',
        ];

        $data = (object)$data;

        return view('dashboard.dashboard', compact('data'));
    }
}
