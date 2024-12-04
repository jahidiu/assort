@extends('front_end.layouts.layout')

@section('content')

    {{-- <div class="project_details">
    <div class="container">
        <h1 class="title">{{ $data->project->title }} Details</h1>
        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="production_facilities_image">
                        <a href="{{asset('storage/project/images/' . $data->project->featured_image)}}" class="popup">
                            <img class="img-fluid"
                                src="{{asset('storage/project/images/' . $data->project->featured_image)}}" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        @foreach ($data->project->images as $image)
                        <div class="col-md-3 mb-4">
                            <div class="production_facilities_images">
                                <img src="{{asset('storage/project/images/' . $image->image)}}" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="details">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link active custom-tab-button" id="tab-1" data-toggle="tab" href="#summary"
                            role="tab" aria-controls="home" aria-selected="true">Summary</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link custom-tab-button" id="profile-tab" data-toggle="tab" href="#location"
                            role="tab" aria-controls="profile" aria-selected="false">Location</a>
                    </li>
                    <li class="nav-item custom-tab-button">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#floor_plans" role="tab"
                            aria-controls="contact" aria-selected="false">Floor Plans</a>
                    </li>
                    <li class="nav-item custom-tab-button">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#video" role="tab"
                            aria-controls="contact" aria-selected="false">Video</a>
                    </li>
                    <li class="nav-item custom-tab-button">
                        <a target="_blank" class="nav-link"
                            href="{{ asset('storage/project/brochures/' . $data->project->brochure)  }}">E-Brochure</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="summary" role="tabpanel" aria-labelledby="tab-1">

                        <div class="summary">
                            <h5 class="font-bold">Project Details</h5>

                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="table-primary2">Location</td>
                                            <td>{{ $data->project->address }}</td>
                                            
                                        </tr>

                                        <tr>
                                            <td class="table-primary2">Type of Project</td>
                                            <td>{{ $data->project->type_of_project }}</td>
                                        </tr>

                                        <tr>
                                            <td class="table-primary2">Built Up Area</td>
                                            <td>{{ $data->project->built_up_area }}</td>
                                        </tr>

                                        <tr>
                                            <td class="table-primary2">Number of Floors</td>
                                            <td>{{ $data->project->number_of_floors }}</td>
                                        </tr>

                                    </table>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="table-primary2">Apartment/Floor </td>
                                            <td>{{ $data->project->apartment_floor }}</td>
                                        </tr>

                                        <tr>
                                            <td class="table-primary2">Size</td>
                                            <td>{{ $data->project->size }}</td>
                                        </tr>

                                        <tr>
                                            <td class="table-primary2">Bedroom</td>
                                            <td>{{ $data->project->bedroom }}</td>
                                        </tr>

                                        <tr>
                                            <td class="table-primary2">Bathroom</td>
                                            <td>{{ $data->project->bathroom }}</td>
                                        </tr>

                                    </table>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="table-primary2">Collection</td>
                                            <td>{{ $data->project->collection }}</td>
                                        </tr>

                                        <tr>
                                            <td class="table-primary2">Launch Date</td>
                                            <td>{{ $data->project->launch_date }}</td>
                                        </tr>

                                        <tr>
                                            <td class="table-primary2">Completion Date</td>
                                            <td>{{ $data->project->completion_date }}</td>
                                        </tr>

                                        <tr>
                                            <td class="table-primary2">Status</td>
                                            <td>{{ $data->project->status }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="profile-tab">
                        <iframe src="{{ $data->project->iframe_code }}"
                            style="width:100%; height:450px; border: none;" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="tab-pane fade" id="floor_plans" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="floor_plans">
                            <div class="row">
                                @foreach ($data->project->floor_plans as $fp)
                                <div class="col-md-4 mt-3">
                                    <div class="fp_img">
                                        <a href="{{asset('storage/project/images/' . $fp->image)}}" class="popup">
                                            <img src="{{asset('storage/project/images/' . $fp->image)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="proj_video">
                            <div class="row">
                                @foreach ($data->project->videos as $video)

                                <div class="col-md-6 mt-4">
                                    <div class="pv">
                                        <iframe src="https://www.youtube.com/embed/{{ $video->url }}" frameborder="0"
                                            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> --}}

    <div class="project_details">
        <div class="container">
            <h1 class="title">{{ $data->project->title }} Details</h1>
            <div class="content">
                <div class="row">

                    <div class="col-md-4">
                        <div class="production_facilities_image">
                            <a href="{{ asset('storage/project/images/' . $data->project->featured_image) }}" class="popup">
                                <img class="img-fluid"
                                    src="{{ asset('storage/project/images/' . $data->project->featured_image) }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="row mt-3">
                            @foreach ($data->project->images as $image)
                                <div class="col-lg-3 col-md-3 col-sm-4 mb-3">
                                    <div class="production_facilities_images">
                                        <img src="{{ asset('storage/project/images/' . $image->image) }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-8">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active custom-tab-button" id="tab-1" data-toggle="tab"
                                    href="#summary" role="tab" aria-controls="home" aria-selected="true">Summary</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link custom-tab-button" id="profile-tab" data-toggle="tab" href="#location"
                                    role="tab" aria-controls="profile" aria-selected="false">Location</a>
                            </li>
                            <li class="nav-item custom-tab-button">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#video" role="tab"
                                    aria-controls="contact" aria-selected="false">Video</a>
                            </li>
                            <li class="nav-item custom-tab-button">
                                @if (@$data->project->brochure)
                                    <a target="_blank" class="nav-link" href="{{ asset('storage/project/brochures/' . $data->project->brochure) }}">E-Brochure</a>
                                @else
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary float-right ml-3" data-toggle="modal"
                                    data-target="#BrochureModall">E-Brochure</button>
                                    
                                @endif
                                
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="summary" role="tabpanel" aria-labelledby="tab-1">

                                <div class="summary">
                                    <div class="row">
                                        {!! $data->project->description !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td class="table-primary2">Location</td>
                                                    <td>{{ $data->project->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-primary2">Type of Project</td>
                                                    <td>{{ $data->project->type_of_project }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-primary2">Built Up Area</td>
                                                    <td>{{ $data->project->built_up_area }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-primary2">Number of Floors</td>
                                                    <td>{{ $data->project->number_of_floors }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-primary2">Apartment/Floor </td>
                                                    <td>{{ $data->project->apartment_floor }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-primary2">Size</td>
                                                    <td>{{ $data->project->size }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-primary2">Bedroom</td>
                                                    <td>{{ $data->project->bedroom }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-primary2">Bathroom</td>
                                                    <td>{{ $data->project->bathroom }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-primary2">Collection</td>
                                                    <td>{{ $data->project->collection }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-primary2">Launch Date</td>
                                                    <td>{{ $data->project->launch_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-primary2">Completion Date</td>
                                                    <td>{{ $data->project->completion_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="table-primary2">Status</td>
                                                    <td>{{ $data->project->status }}</td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="profile-tab">
                                <iframe src="{{ $data->project->iframe_code }}"
                                    style="width:100%; height:450px; border: none;" aria-hidden="false"
                                    tabindex="0"></iframe>
                            </div>
                            <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="proj_video">
                                    <div class="row">
                                        @foreach ($data->project->videos as $video)
                                            <div class="col-md-6 mt-4">
                                                <div class="pv">
                                                    <iframe src="https://www.youtube.com/embed/{{ $video->url }}"
                                                        frameborder="0"
                                                        allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade pt-5 mt-5" id="BrochureModall" tabindex="-1" role="dialog"
        aria-labelledby="BrochureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BrochureModalLabel">Contact Us for E-Brochure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-center">

                    <h5><a target="_blank" href="{{ route('contactus.index') }}">Contact Us</a></h5>

                </div>
            </div>
        </div>
    </div>

@endsection
