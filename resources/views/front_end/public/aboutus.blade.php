@extends('front_end.layouts.layout')


@section('content')

<div class="aboutus_page">
    <div class="container">
        <h1 class="title">About Us</h1>
        <div class="subtitle">
            <h5>Assort Housing & Engineering Ltd. is a fast growing housing company with the effort of a team of
                experienced and qualified professionals. </h5>
        </div>

        <div class="why_choose_us">
            <div class="row">
                <div class="col-md-6" style="z-index: -11;">
                    <div class="why_choose_us_con">
                        <div class="hedding">
                            <h2>{{ $data->page1->page_name }}</h2>
                            <div class="aaaaaaaa"></div>
                            <div class="borders"></div>
                        </div>
                        <div class="aaaaaa"></div>
                        {!! $data->page1->page_content !!}
                    </div>
                </div>
                <div class="col-md-6 mb-3" style="z-index: -11;">
                    <img src="{{ asset('storage/pageimage/'. $data->page1->feature_image ) }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="why_choose_us">
            <div class="row">

                <div class="col-md-6 mb-3" style="z-index: -11;">
                    <img src="{{ asset('storage/pageimage/'. $data->page2->feature_image ) }}" alt="" class="img-fluid">
                </div>

                <div class="col-md-6" style="z-index: -11;">
                    <div class="why_choose_us_con">
                        <div class="hedding">
                            <h2>{{ $data->page2->page_name }}</h2>
                            <div class="aaaaaaaa"></div>
                            <div class="borders"></div>
                        </div>
                        <div class="aaaaaa"></div>
                        {!! $data->page2->page_content !!}
                    </div>
                </div>

            </div>
        </div>

        <div class="services">

            <div class="row">

                @foreach ($data->services as $services)

                <div class="p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-img pb-3">
                    {{--<i class="fas fa-paint-brush"></i>--}}
                        {!! $services->slug !!}
                    </div>
                    <div class="card-box">
                        <h4 class="card-title py-3 mbr-fonts-style display-5">
                            {{$services->page_name}}</h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            {!! $services->page_content !!}
                        </p>
                    </div>
                </div>

                @endforeach

            </div>

        </div>
    </div>

    <div class="team">

        <div class="container">

            <h1 class="title">Meet Our Management</h1>

            <div class="row">

                @foreach($data->managements as $management)

                    <div class="col-md-3 mt-3">
                        <div class="member">
                            <div class="card">
                                <img src="{{asset('storage/management/image/'. $management->image)}}" alt="Jane" style="width: 100%;height: 270px;margin: 0 auto;">
                                <div class="container">
                                    <h2 class="mt-3 h2">{{$management->name}}</h2>
                                    <p class="title-2">{{$management->designation}}</p>
                                    <p>{{$management->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>

    </div>

</div>

@endsection