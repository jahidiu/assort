<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
     public function index()
    {

        if ( Session::has( 'locale') &&  Session::get( 'locale' ) == 'ar' ) {
            $content = Page::where( 'slug', 'our-services-ar' )->get()->first();
        } else {
            $content = Page::where( 'slug', 'our-services' )->get()->first();
        }

        $data = [
            'title'     => $content->page_name,
            'content'   => $content
        ];

        $data = ( object ) $data;

        return view('font_end.service', compact('data'));
    }
}
