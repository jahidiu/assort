@extends('front_end.layouts.layout')


@section('content')

<div class="aboutus_page">
    <div class="container">
        <h1 class="title">{{ $data->title }}</h1>
        <div class="subtitle">
            <h5>{{ $data->disclaimer->slug }}</h5>
        </div>

        <div class="why_choose_us">
            <div class="row">
                <div class="col-md-12" style="z-index: -11;">
                    <div class="why_choose_us_con">
                        <div class="hedding">
                            <h2>{{ $data->disclaimer->page_name }}</h2>
                            <div class="aaaaaaaa"></div>
                            <div class="borders"></div>
                        </div>
                        <div class="aaaaaa"></div>
                        {!! $data->disclaimer->page_content !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection