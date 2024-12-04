@extends('front_end.new_design.layouts.master')

@section('title')
  Gallery
@endsection

@section('content')
  <!-- Page title section:Start -->
  <div class="page-header">Gallery</div>
  <!-- Page title section:End -->

  <!-- Gallery Section:Start -->
  <div class="gallery_page container-fluid">

    <!-- <h2 class="section-title">All Gallery</h2> -->
    <div class="gallery_section">
      <h2 class="section-title">Image Gallery</h2>
      <div class="container">
        <div class="image-gallery">
          <div class="masonry_container">
            <div class="masonry">
              @foreach ($data->gallerys as $gallery)
                @foreach ($gallery->images as $image)
                  <a class="brick" href="{{ asset('storage/imagegallery/image/' . $image->image) }}">
                    <div class="gallery_item">
                      <img src="{{ asset('storage/imagegallery/image/' . $image->image) }}" alt="gallery image">
                      <div class="gallery_overlay"></div>
                      <p class="gallery_title">{{ $image->title }}</p>
                    </div>
                  </a>
                @endforeach
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- <div class="gallery row" data-aos="fade-up">
      @foreach ($data->gallerys as $gallery)
        @foreach ($gallery->images as $image)
          <div class="col-lg-3 col-md-4 col-sm-6 col-6" data-aos="flip-right">
            <div class="single-gallery-item">
              <a class="gallery_item" href="{{ asset('storage/imagegallery/image/' . $image->image) }}">
                <img src="{{ asset('storage/imagegallery/image/' . $image->image) }}" alt="gallery image">
                <div class="gallery_overlay"></div>
                <p class="gallery_title">{{ $image->title }}</p>
              </a>
            </div>
          </div>
        @endforeach
      @endforeach
    </div> --}}

    <!-- Pagination section:Start -->
    {{ $data->gallerys->links('front_end.new_design.includes.custom-paginate') }}

    <!-- Pagination section:End -->
  </div>
  <!-- Gallery Section:End -->
@endsection
