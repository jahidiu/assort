@extends('front_end.layouts.layout')


@section('content')
  <div class="project_page">
    <div class="container2">
      <h1 class="title">{{ $data->title }}</h1>

      @if ($data->title == 'Ready Flats')
        <h3 style="font-size: 21px; text-align: center; color: grey;">Call US - 01711-535262, 01731679682, 01729596322</h3>
      @endif

      <div class="content">
        <div class="row">

          @foreach ($data->projects as $project)
            <div class="col-md-3 col-sm-3 mt-3">
              <div class="project" data-aos="flip-left" data-aos-duration="2000">
                <img src="{{ asset('storage/project/images/' . $project->featured_image) }}" class="img-fluid"
                  alt="image">

                <div class="bottom">
                  <div class="container2">
                    <h5>{{ $project->title }}</h5>
                    <p>{{ $project->address }}</p>
                  </div>

                </div>

                <div class="full" url="{{ route('project.details', $project->id) }}">
                  <div class="texts">
                    <h4>{{ $project->title }}</h4>
                    <h4> <a href="{{ route('project.details', $project->id) }}">EXPLORE</a> </h4>
                  </div>
                </div>
                
                @if ($project->id == 30 || $project->id == 35)
                <div class="flat_status">Sold Out</div> 
                @endif
              </div>
            </div>
          @endforeach

        </div>
      </div>

    </div>

  </div>
@endsection
