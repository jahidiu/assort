@extends('front_end.new_design.layouts.master')

@section('title') Home @endsection

@section('content')
<!-- Page title section:Start -->
<div class="page-header">Hand Over Projects</div>
<!-- Page title section:End -->

<!-- Hand over projects list:start -->
<div class="hand_over_project_container">
  <div class="container">
    <div class="row">
      @foreach ($data->projects as $project)
        <div class="col-xl-3 col-lg-4 col-6" data-aos="flip-right">
          <a href="javascript:0">
            <div class="single_Project">
              <div class="project_img_container">
                <img class="project-img-top img-fluid"
                  src="{{ asset('storage/project/images/' . $project->image) }}" alt="Project image">
              </div>
              <div class="card-body">
                <h4 class="card-title">{!! $project->name !!}</h4>
                <div class="address mb-2">
                  <i class="fas fa-map-marker-alt"></i>
                  <span>{{ $project->address }}</span>
                </div>
                {{-- <div class="d-flex justify-content-between flax-wrap"></div> --}}
                <div class="hand_over_date mb-2">
                  <i class="far fa-calendar-check"></i>
                  <span>{{ $project->handover_date }}</span>
                </div>
                <div class="number_of_storied">
                  <i class="far fa-building"></i>
                  <span>{{ $project->no_of_storied }} Storied</span>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach

    </div>
    <!-- Pagination section:Start -->
    {{ $data->projects->links('front_end.new_design.includes.custom-paginate') }}
    <!-- Pagination section:End -->
  </div>
</div>

<!-- Hand over projects list:end -->
@endsection