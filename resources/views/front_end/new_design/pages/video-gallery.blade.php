@extends('front_end.new_design.layouts.master')

@section('title')
  Home
@endsection

@section('content')
  <!-- Page title section:Start -->
  <div class="page-header">Video Gallery</div>
  <!-- Page title section:End -->

  <!-- Video Gallery Section:Start -->
  <div class="gallery_section video_gallery_section page" data-aos="fade-up">

    <div class="container">
      <div class="video-gallery">
        @foreach ($data->videos as $video)
          <a class="gallery_item" href="https://www.youtube.com/watch?v={{ $video->video_url }}">
            <img src="{{ asset('storage/videogallery/image/' . $video->thumbnail) }}" alt="gallery image">
            <div class="gallery_overlay"></div>
            <p class="gallery_title">{{ $video->title }}</p>
          </a>
        @endforeach

      </div>
      
    <!-- Pagination section:Start -->
    {{ $data->videos->links('front_end.new_design.includes.custom-paginate') }}

    <!-- Pagination section:End -->
    </div>
  </div>
  <!-- Video Gallery Section:End -->
@endsection
