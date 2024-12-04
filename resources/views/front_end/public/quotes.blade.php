@extends('front_end.layouts.layout')


@section('content')

<div class="client">
    <div class="container">
        <h1 class="title">
            Our Clients Speaks For Us
        </h1>

        <div class="content">
            <div class="row">
                @foreach ($data->posts as $post)
                <div class="col-md-6 mt-5" data-aos="fade-up"
                     data-aos-duration="1500">
                    <div class="image">
                        <img src="{{ asset('storage/post_image/'.$post->feature_image) }}" alt="image">
                    </div>
                    <div class="quote">{!! $post->post_description !!}</div>
                    <div class="by"> ~ {!! $post->post_title !!}</div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection