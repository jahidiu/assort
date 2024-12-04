@extends('front_end.layouts.layout')


@section('content')

<link rel="stylesheet" href="{{asset('new_design/assets/css/magnific-popup.min.css')}}">

<div class="photo_gallery">
    <div class="container">
        <h1 class="title">{{ $data->title }}</h1>


        <div class="content">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                    @php $a = 1; @endphp

                    @foreach ($data->gallerys as $gallery)

                    <a class="nav-item nav-link @if ($a) active @endif" id="nav-tab-{{ $gallery->id }}" data-toggle="tab" href="#nav-{{ $gallery->id }}" role="tab"
                        aria-controls="nav-{{ $gallery->id }}" aria-selected="true">{{ $gallery->name }}</a>

                    @php $a = 0;  @endphp

                    @endforeach
                </div>
            </nav>



            <div class="tab-content" id="nav-tabContent">

                @php $a = 1;  @endphp

                @foreach ($data->gallerys as $gallery)

                <div class="tab-pane fade @if ($a) show active  @endif" id="nav-{{ $gallery->id }}" role="tabpanel" aria-labelledby="nav-tab-1">

                    {{-- <div class="row">

                        @foreach ($gallery->images as $image)

                        <div class="col-md-3 mt-4">
                            <a href="{{ asset('storage/imagegallery/image/' . $image->image) }}" class="popup">
                                <img src="{{ asset('storage/imagegallery/image/' . $image->image) }}" class="gallery_image " alt="gdfgd gfga">
                            </a>
                        </div>

                        @endforeach

                    </div> --}}

                    <div class="masonry_container image-gallery">
                        <div class="masonry">
                            @foreach ($gallery->images as $image)
                              <a class="brick" href="{{ asset('storage/imagegallery/image/' . $image->image) }}">
                                <div class="gallery_item">
                                  <img src="{{ asset('storage/imagegallery/image/' . $image->image) }}" alt="gallery image">
                                  {{-- <div class="gallery_overlay"></div> --}}
                                </div>
                              </a>
                            @endforeach
                        </div>
                      </div>

                </div>

                @php $a = 0; @endphp

                @endforeach

            </div>

        </div>
    </div>
</div>
<script src="{{asset('new_design/assets/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('new_design/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script>
        $(document).ready(function () {
        $(".image-gallery").magnificPopup({
            delegate: ".masonry a.brick",
            type: "image",
            gallery: {
                enabled: true,
            },
        });
        });
</script>
@endsection