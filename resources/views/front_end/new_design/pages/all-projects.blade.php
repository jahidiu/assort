@extends('front_end.new_design.layouts.master')

@section('title')
  All Projects
@endsection

@section('content')
  <!-- Page title section:Start -->
  <div class="page-header">All Projects</div>
  <!-- Page title section:End -->

  <div class="project-tabs" data-aos="fade-up">
    <div class="project-tablist d-flex justify-content-center">
      <ul class="nav nav-tabs" id="projectTabs" role="tablist" data-aos="zoom-in">
        <div class="slider"></div>
        <li class="nav-item" role="presentation">
          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#ongoing-project" type="button"
            role="tab" aria-controls="home" aria-selected="true">Ongoing Project</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#upcoming-project" type="button" role="tab"
            aria-controls="contact" aria-selected="false">Upcoming Project</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#complete-project" type="button" role="tab"
            aria-controls="profile" aria-selected="false">Ready Project</button>
        </li>
      </ul>
    </div>
    <div class="tab-content">
      <div class="tab-pane fade show active" id="ongoing-project" role="tabpanel">
        <div class="container">
          <div class="project_grid_with_container">
            @foreach ($data->ongoings as $ongoing)
              <div class="ongoing-project single-project-container tilt">
                <a href="{{ route('project.details', $ongoing->id) }}">
                  <div class="single-project">
                    <img src="{{ asset('storage/project/images/' . $ongoing->featured_image) }}" class="project_img"
                      alt="project image">
                    <div class="project_info">
                      <!-- <div class="project_name">Assort Villina</div> -->
                      <button class="btn btn-2 hover-slide-down mt-3">
                        <span>Explore</span>
                      </button>
                    </div>
                  </div>

                  <div class="project_basic_info">
                    <div class="project_name">{{ $ongoing->title }}</div>
                    <div class="separetor"></div>
                    <div class="project_location">{{ $ongoing->address }}</div>
                  </div>
                </a>
              </div>
            @endforeach

          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="upcoming-project" role="tabpanel">
        <div class="container">
          <div class="project_grid_with_container">

            @foreach ($data->upcomming as $item)
              <div class="upcoming-project single-project-container tilt">
                <a href="{{ route('project.details', $item->id) }}">
                  <div class="single-project">
                    <img src="{{ asset('storage/project/images/' . $item->featured_image) }}" class="project_img"
                      alt="project image">
                    <div class="project_info">
                      <!-- <div class="project_name">Assort Villina</div> -->
                      <button class="btn btn-2 hover-slide-down mt-3">
                        <span>Explore</span>
                      </button>
                    </div>
                  </div>

                  <div class="project_basic_info">
                    <div class="project_name">{{ $item->title }}</div>
                    <div class="separetor"></div>
                    <div class="project_location">{{ $item->address }}</div>
                  </div>
                </a>
              </div>
            @endforeach

          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="complete-project" role="tabpanel">
        <div class="container">
          <div class="project_grid_with_container">
            @foreach ($data->readys as $ready)
              <div class="completed-project single-project-container tilt">
                <a href="{{ route('project.details', $ready->id) }}">
                  <div class="single-project">
                    <img src="{{ asset('storage/project/images/' . $ready->featured_image) }}" class="project_img"
                      alt="project image">
                    <div class="project_info">
                      <button class="btn btn-2 hover-slide-down mt-3">
                        <span>Explore</span>
                      </button>
                    </div>
                  </div>

                  <div class="project_basic_info">
                    <div class="project_name">{{ $ready->title }}</div>
                    <div class="separetor"></div>
                    <div class="project_location">{{ $ready->address }}</div>
                  </div>
                </a>
              </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
