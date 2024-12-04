@extends('front_end.layouts.layout')


@section('content')

    <div class="land_wanted">
        <div class="container">
            <h1 class="title">Land Wanted</h1>
        </div>

        <div class="content">
              {{-- land wanted start --}}

                <div class="wanted">
                    <div class="container-fluid">
                        <div class="row">
                            <div data-aos="fade-up"
                                 data-aos-duration="1500" class="col-lg-6 pr-0 pl-0">
                                <div class="space">
                                    <h3>{{$data->wanted->page_name}}</h3>
                                    <h4>{{$data->wanted->slug}}</h4>
                                    
                                    
                                    {!! $data->wanted->page_content !!}
                                    
                                </div>
                            </div>
                            <div data-aos="fade-down"
                                 data-aos-duration="1500" class="col-lg-6 pl-0 pr-0">
                                <div class="image">
                                    <img src="{{ asset('storage/pageimage/' . $data->wanted->feature_image) }}" alt="askdfshd">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                {{-- land wanted end --}}
        </div>


    </div>


@endsection