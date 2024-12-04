@extends('front_end.layouts.layout')


@section('content')
    <link rel="stylesheet" href="{{ asset('new_design/assets/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href=" {{ asset('css/custom-hero-slider.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/lite-yt-embed.css') }} ">

    <div class="hero-section" data-aos="fade-down">
        <div class="swiper heroSlider">
            <div class="swiper-wrapper">
                @foreach ($data->sliders as $slider)
                    {{-- @if ($slider->video)
                        <video class="d-block w-100 slider-height" autoplay="" loop="" muted="">
                            <source src="{{ asset('storage/videogallery/video/' . $slider->video) }}" type="video/mp4">

                            Your browser does not support the video tag.
                        </video>
                    @else --}}
                        <div class="swiper-slide"
                            style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.3) 100%), url('{{ asset('storage/slider/image/' . $slider->image) }}');">
                            <div class="slide-content">

                                <div class="heroSlider-banner-text">
                                    <h1>
                                        <span>{{ $slider->text1 }}</span>
                                        <br>
                                        <span>{{ $slider->text2 }}</span>
                                    </h1>
                                </div>

                            </div>
                        </div>
                    {{-- @endif --}}
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="hero-footer-menu">
            <ul>
                <li>
                    <a href="{{ route('ready.index') }}">Ready To Sell</a>
                </li>

                <li>
                    <a href="{{ route('ongoing.index') }}">Ongoing</a>
                </li>

                <li>
                    <a href="{{ route('upcomming.index') }}">Upcoming</a>
                </li>
            </ul>
        </div>
    </div>

    {{-- sider end  --}}


    {{-- comfortable start --}}


    <div class="comfortable">
        <div class="container2">

            <div class="head">
                <h1>{{ $data->comfortable->page_name }}</h1>
                <h3>{{ $data->comfortable->slug }}</h3>
            </div>

            <div class="row">
                <div class="col-lg-6 pr-0 pl-0" data-aos="fade-left" data-aos-duration="2000">
                    <div class="image">
                        <img src="{{ asset('storage/pageimage/' . $data->comfortable->feature_image) }}" class="img-fluid"
                            alt="image">
                    </div>
                </div>
                <div class="col-lg-6 pl-0 pr-0" data-aos="fade-right" data-aos-duration="2000">
                    <div class="text">


                        {!! $data->comfortable->page_content !!}

                        <a href="{{ route('aboutus.index') }}"> Read More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- comfortable end --}}

    {{-- Service section start --}}

    <div class="home-service-section" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="home-service-section-title">
                        Our Services
                    </div>
                </div>
            </div>
            <div class="row row-gap-24 justify-content-between">
                
                @foreach ($data->services as $service)
                    <div class="col-lg-5 col-sm-6" data-aos="flip-right" data-aos-duration="2000">
                        <div class="single-service-card">
                            <div class="single-service-card-icon">
                                <img src="{{ asset('storage/service_image/' . $service->icon) }}" alt="service img">
                            </div>

                            <div class="single-service-card-title">
                                @if ($loop->first)
                                    <h3><a style="color: #14316A;" href="{{ route('interior.photo.index') }}">{{ $service->title }}</a></h3>
                                @else
                                    <h3><a style="color: #14316A;" href="{{ route('contactus.index') }}">{{ $service->title }}</a></h3>
                                @endif
                            </div>

                            <div class="single-service-card-details">
                                <p>
                                    {!! $service->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    {{-- Service section end --}}

    {{-- highlighted projects start --}}
    <div class="hprojects">
        <div class="container2">
            <div class="title" data-aos="fade-right" data-aos-duration="2500">
                <h1>HIGHLIGHTED PROJECTS</h1>
            </div>
            <div class="content">

                <div class="row">

                    @foreach ($data->ongoings as $ongoing)
                        <div class="col-lg-3 col-md-4 col-sm-6 mt-3">
                            <div class="project" data-aos="flip-right" data-aos-duration="2000">
                                <img src="{{ asset('storage/project/images/' . $ongoing->featured_image) }}"
                                    class="img-fluid" alt="image">

                                <div class="bottom">
                                    <div class="container2">
                                        <h5>{{ $ongoing->title }}</h5>
                                        <p>{{ $ongoing->address }}</p>
                                    </div>
                                    
                                    
                                </div>

                                <div class="full" url="{{ route('project.details', $ongoing->id) }}">
                                    <div class="texts">
                                        <h4>{{ $ongoing->title }}</h4>
                                        <h4>
                                            <a href="{{ route('project.details', $ongoing->id) }}">EXPLORE</a>
                                        </h4>
                                    </div>
                                </div>

                                @if ($ongoing->id == 30 || $ongoing->id == 35)
                                    <div class="flat_status">Sold Out</div> 
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
    {{-- highlighted projects end --}}


    {{-- ready to sell start --}}

    <div class="rsell">
        <div class="container2">
            <div class="title" data-aos="fade-right" data-aos-duration="2500">
                <h1>READY TO SELL</h1>
                <h3>Call US - 01711-535262, 01731679682, 01729596322</h3>
            </div>
            <div class="content">

                <div class="row">

                    @foreach ($data->readys as $ready)
                        <div class="col-lg-3 col-md-4 col-sm-6 mt-3">
                            <div class="project" data-aos="flip-left" data-aos-duration="2000">

                                <img src="{{ asset('storage/project/images/' . $ready->featured_image) }}"
                                    class="img-fluid" alt="image">

                                <div class="bottom">
                                    <div class="container2">
                                        <h5>{{ $ready->title }}</h5>
                                        <p>{{ $ready->address }}</p>
                                    </div>

                                </div>

                                <div class="full" url="{{ route('project.details', $ready->id) }}">
                                    <div class="texts">
                                        <h4>{{ $ready->title }}</h4>
                                        <h4>
                                            <a href="{{ route('project.details', $ready->id) }}">EXPLORE</a>
                                        </h4>
                                    </div>
                                </div>
                                
                                
                                @if ($ready->id == 30 || $ready->id == 35)
                                    <div class="flat_status">Sold Out</div> 
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    {{-- ready to sell end --}}

    {{-- land wanted start --}}

    <div class="wanted">
        <div class="container-fluid">
            <div class="row">
                <div data-aos="fade-up" data-aos-duration="1500" class="col-lg-6 pr-0 pl-0">
                    <div class="space">
                        <h3>{{ $data->wanted->page_name }}</h3>
                        <h4>{{ $data->wanted->slug }}</h4>


                        {!! $data->wanted->page_content !!}


                        <a href="{{ route('land.wanted') }}">Read More</a>
                    </div>
                </div>
                <div data-aos="fade-down" data-aos-duration="1500" class="col-lg-6 pl-0 pr-0">
                    <div class="image">
                        <img src="{{ asset('storage/pageimage/' . $data->wanted->feature_image) }}" alt="askdfshd">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- land wanted end --}}

    <div class="wanted">
        <div class="container-fluid">
            <div class="row">
                <div data-aos="fade-down" data-aos-duration="1500" class="col-lg-6 pl-0 pr-0">
                    {{-- <iframe style="height: 576px; width:100%; border: none;"
                        src="https://www.youtube.com/embed/{{ $data->video1->video_url }}"
                        allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"></iframe> --}}
                        <lite-youtube videoid="{{ $data->video1->video_url }}"></lite-youtube>
                </div>
                <div data-aos="fade-up" data-aos-duration="1500" class="col-lg-6 pr-0 pl-0">
                    {{-- <iframe style="height: 576px; width:100%; border: none;"
                        src="https://www.youtube.com/embed/{{ $data->video2->video_url }}"
                        allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"></iframe> --}}
                        
                        <lite-youtube videoid="{{ $data->video2->video_url }}"></lite-youtube>
                </div>

            </div>
        </div>
    </div>

    {{-- video end --}}

    {{-- for litely youtube load --}}
    <script src="{{ asset('js/lite-yt-embed.js') }}"></script>
    
    <script src="{{ asset('new_design/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('new_design/assets/js/swiper-bundle.min.js') }}"></script>
    <script>
        var swiper = new Swiper(".heroSlider", {
            loop: true,
            autoplay: true,
            speed: 4000,
            // effect: "fade",
            allowTouchMove: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                position: "left",
            },
        });
    </script>
@endsection
