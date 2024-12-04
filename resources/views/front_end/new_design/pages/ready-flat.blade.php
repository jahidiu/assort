@extends('front_end.new_design.layouts.master')

@section('title') Ready Flat @endsection

@section('content')
  <!-- Page title section:Start -->
  <div class="page-header">Ready Flat</div>
  <!-- Page title section:End -->

  <!-- Ready Flat List:Start -->
  <div class="ready_flat_section container">
    <div class="project_grid_with_container" data-aos="fade-up">
      @foreach ($data->projects as $project)
        <div class="single-project-container tilt">
          <a href="{{ route('project.details', $project->id) }}">
            <div class="single-project">
              <img src="{{ asset('storage/project/images/' . $project->featured_image) }}" class="project_img"
                alt="project image">
              <div class="project_info">
                <!-- <div class="project_name">Assort Villina</div> -->
                <button class="btn btn-2 hover-slide-down mt-3">
                  <span>Explore</span>
                </button>
              </div>
            </div>

            <div class="project_basic_info">
              <div class="project_name">{{ $project->title }}</div>
              <div class="separetor"></div>
              <div class="project_location">{{ $project->address }}</div>
            </div>
          </a>
        </div>
      @endforeach
      {{-- <div class="single-project-container tilt">
      <a href="project_details.php">
        <div class="single-project">
          <img src="{{ asset('new_design') }}/assets/img/completed_projects/assort golden cestle.jpg"
            class="project_img" alt="project image">
          <div class="project_info">
            <!-- <div class="project_name">Assort Villina</div> -->
            <button class="btn btn-2 hover-slide-down mt-3">
              <span>Explore</span>
            </button>
          </div>
        </div>

        <div class="project_basic_info">
          <div class="project_name">assort golden cestle</div>
          <div class="separetor"></div>
          <div class="project_location">House#412, Road#19, Block#G, Bashundhara R/A, Dhaka.
          </div>
        </div>
      </a>
    </div>

    <div class="single-project-container tilt">
      <a href="project_details.php">
        <div class="single-project">
          <img src="{{ asset('new_design') }}/assets/img/completed_projects/assort nusara.jpg" class="project_img"
            alt="project image">
          <div class="project_info">
            <!-- <div class="project_name">Assort Villina</div> -->
            <button class="btn btn-2 hover-slide-down mt-3">
              <span>Explore</span>
            </button>
          </div>
        </div>

        <div class="project_basic_info">
          <div class="project_name">assort nusara</div>
          <div class="separetor"></div>
          <div class="project_location">House#412, Road#19, Block#G, Bashundhara R/A, Dhaka.
          </div>
        </div>
      </a>
    </div>

    <div class="single-project-container tilt">
      <a href="project_details.php">
        <div class="single-project">
          <img src="{{ asset('new_design') }}/assets/img/completed_projects/assort shamolima.jpg" class="project_img"
            alt="project image">
          <div class="project_info">
            <!-- <div class="project_name">Assort Villina</div> -->
            <button class="btn btn-2 hover-slide-down mt-3">
              <span>Explore</span>
            </button>
          </div>
        </div>

        <div class="project_basic_info">
          <div class="project_name">assort shamolima</div>
          <div class="separetor"></div>
          <div class="project_location">House#412, Road#19, Block#G, Bashundhara R/A, Dhaka.
          </div>
        </div>
      </a>
    </div>

    <div class="single-project-container tilt">
      <a href="project_details.php">
        <div class="single-project">
          <img src="{{ asset('new_design') }}/assets/img/completed_projects/assort villina.jpg" class="project_img"
            alt="project image">
          <div class="project_info">
            <!-- <div class="project_name">Assort Villina</div> -->
            <button class="btn btn-2 hover-slide-down mt-3">
              <span>Explore</span>
            </button>
          </div>
        </div>

        <div class="project_basic_info">
          <div class="project_name">assort villina</div>
          <div class="separetor"></div>
          <div class="project_location">House#412, Road#19, Block#G, Bashundhara R/A, Dhaka.
          </div>
        </div>
      </a>
    </div>

    <div class="single-project-container tilt">
      <a href="project_details.php">
        <div class="single-project">
          <img src="{{ asset('new_design') }}/assets/img/completed_projects/assort golden cestle.jpg"
            class="project_img" alt="project image">
          <div class="project_info">
            <!-- <div class="project_name">Assort Villina</div> -->
            <button class="btn btn-2 hover-slide-down mt-3">
              <span>Explore</span>
            </button>
          </div>
        </div>

        <div class="project_basic_info">
          <div class="project_name">assort golden cestle</div>
          <div class="separetor"></div>
          <div class="project_location">House#412, Road#19, Block#G, Bashundhara R/A, Dhaka.
          </div>
        </div>
      </a>
    </div>

    <div class="single-project-container tilt">
      <a href="project_details.php">
        <div class="single-project">
          <img src="{{ asset('new_design') }}/assets/img/completed_projects/assort nusara.jpg" class="project_img"
            alt="project image">
          <div class="project_info">
            <!-- <div class="project_name">Assort Villina</div> -->
            <button class="btn btn-2 hover-slide-down mt-3">
              <span>Explore</span>
            </button>
          </div>
        </div>

        <div class="project_basic_info">
          <div class="project_name">assort nusara</div>
          <div class="separetor"></div>
          <div class="project_location">House#412, Road#19, Block#G, Bashundhara R/A, Dhaka.
          </div>
        </div>
      </a>
    </div>

    <div class="single-project-container tilt">
      <a href="project_details.php">
        <div class="single-project">
          <img src="{{ asset('new_design') }}/assets/img/completed_projects/assort shamolima.jpg" class="project_img"
            alt="project image">
          <div class="project_info">
            <!-- <div class="project_name">Assort Villina</div> -->
            <button class="btn btn-2 hover-slide-down mt-3">
              <span>Explore</span>
            </button>
          </div>
        </div>

        <div class="project_basic_info">
          <div class="project_name">assort shamolima</div>
          <div class="separetor"></div>
          <div class="project_location">House#412, Road#19, Block#G, Bashundhara R/A, Dhaka.
          </div>
        </div>
      </a>
    </div>

    <div class="single-project-container tilt">
      <a href="project_details.php">
        <div class="single-project">
          <img src="{{ asset('new_design') }}/assets/img/completed_projects/assort golden cestle.jpg"
            class="project_img" alt="project image">
          <div class="project_info">
            <!-- <div class="project_name">Assort Villina</div> -->
            <button class="btn btn-2 hover-slide-down mt-3">
              <span>Explore</span>
            </button>
          </div>
        </div>

        <div class="project_basic_info">
          <div class="project_name">assort golden cestle</div>
          <div class="separetor"></div>
          <div class="project_location">House#412, Road#19, Block#G, Bashundhara R/A, Dhaka.
          </div>
        </div>
      </a>
    </div>

    <div class="single-project-container tilt">
      <a href="project_details.php">
        <div class="single-project">
          <img src="{{ asset('new_design') }}/assets/img/completed_projects/assort nusara.jpg" class="project_img"
            alt="project image">
          <div class="project_info">
            <!-- <div class="project_name">Assort Villina</div> -->
            <button class="btn btn-2 hover-slide-down mt-3">
              <span>Explore</span>
            </button>
          </div>
        </div>

        <div class="project_basic_info">
          <div class="project_name">assort nusara</div>
          <div class="separetor"></div>
          <div class="project_location">House#412, Road#19, Block#G, Bashundhara R/A, Dhaka.
          </div>
        </div>
      </a>
    </div>

    <div class="single-project-container tilt">
      <a href="project_details.php">
        <div class="single-project">
          <img src="{{ asset('new_design') }}/assets/img/completed_projects/assort shamolima.jpg" class="project_img"
            alt="project image">
          <div class="project_info">
            <!-- <div class="project_name">Assort Villina</div> -->
            <button class="btn btn-2 hover-slide-down mt-3">
              <span>Explore</span>
            </button>
          </div>
        </div>

        <div class="project_basic_info">
          <div class="project_name">assort shamolima</div>
          <div class="separetor"></div>
          <div class="project_location">House#412, Road#19, Block#G, Bashundhara R/A, Dhaka.
          </div>
        </div>
      </a>
    </div>
     --}}
    </div>
  </div>
  <!-- Ready Flat List:End -->
@endsection
