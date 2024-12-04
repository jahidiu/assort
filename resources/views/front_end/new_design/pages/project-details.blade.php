@extends('front_end.new_design.layouts.master')

@section('title')
  Project Details
@endsection

@section('content')
  <!-- Page title section:Start -->
  <div class="page-header">{{ $data->project->title }}</div>
  <!-- Page title section:End -->

  <div class="project_details_section" data-aos="fade-up">
    <div class="container p-0">
      <div class="row g-0">
        <div class="col-xl-6 col-lg-6 left_sticky_section p-0">

          <div class="project_details_image_section">
            <div class="image-gallery">
              <!-- Main image, on which xzoom will be applied -->
              <div class="main-image">
                <img class="xzoom" id="main_image"
                  src="{{ asset('storage/project/images/' . $data->project->featured_image) }}"
                  xoriginal="{{ asset('storage/project/images/' . $data->project->featured_image) }}">
              </div>

              <!-- Thumbnails -->
              <div class="thumbnails owl-carousel row g-0">
                @foreach ($data->project->images as $image)
                  <a href="{{ asset('storage/project/images/' . $image->image) }}" class="col-2 p-0">
                    <img class="xzoom-gallery" width="100%" src="{{ asset('storage/project/images/' . $image->image) }}"
                      xpreview="{{ asset('storage/project/images/' . $image->image) }}">
                  </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 right_content p-0">
          <div class="prject_details_right">

            <div class="project-tablist project_tab_section">
              <ul class="nav nav-tabs" role="tablist">
                <div class="slider"></div>
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#project_specification"
                    type="button" role="tab" aria-controls="home" aria-selected="true">Specification</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#project_overview" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Overview</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#project_video_tab"
                    type="button" role="tab" aria-selected="false">Video</button>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="project_specification" role="tabpanel">
                  <div class="details_container p-3 p-sm-0">

                    <div class="row single_details_item g-0">
                      <div class="col-5 col-sm-5 col-md-5 col-lg-5 details_name">Location</div>
                      <div class="col-7 col-sm-7 col-md-7 col-lg-7 details_value">{{ $data->project->address }}
                      </div>
                    </div>
                    <div class="row single_details_item g-0">
                      <div class="col-5 col-sm-5 col-md-5 col-lg-5 details_name">Type of Project</div>
                      <div class="col-7 col-sm-7 col-md-7 col-lg-7 details_value">{{ $data->project->type_of_project }}
                      </div>
                    </div>
                    <div class="row single_details_item g-0">
                      <div class="col-5 col-sm-5 col-md-5 col-lg-5 details_name">Built Up Area</div>
                      <div class="col-7 col-sm-7 col-md-7 col-lg-7 details_value">{{ $data->project->built_up_area }}
                      </div>
                    </div>
                    <div class="row single_details_item g-0">
                      <div class="col-5 col-sm-5 col-md-5 col-lg-5 details_name">Number of Floors</div>
                      <div class="col-7 col-sm-7 col-md-7 col-lg-7 details_value">{{ $data->project->number_of_floors }}
                      </div>
                    </div>
                    <div class="row single_details_item g-0">
                      <div class="col-5 col-sm-5 col-md-5 col-lg-5 details_name">Apartment/Floor</div>
                      <div class="col-7 col-sm-7 col-md-7 col-lg-7 details_value">{{ $data->project->apartment_floor }}
                      </div>
                    </div>
                    <div class="row single_details_item g-0">
                      <div class="col-5 col-sm-5 col-md-5 col-lg-5 details_name">Size</div>
                      <div class="col-7 col-sm-7 col-md-7 col-lg-7 details_value">{{ $data->project->size }}</div>
                    </div>
                    <div class="row single_details_item g-0">
                      <div class="col-5 col-sm-5 col-md-5 col-lg-5 details_name">Bedroom</div>
                      <div class="col-7 col-sm-7 col-md-7 col-lg-7 details_value">{{ $data->project->bedroom }}</div>
                    </div>
                    <div class="row single_details_item g-0">
                      <div class="col-5 col-sm-5 col-md-5 col-lg-5 details_name">Bathroom</div>
                      <div class="col-7 col-sm-7 col-md-7 col-lg-7 details_value">{{ $data->project->bathroom }}</div>
                    </div>
                    <div class="row single_details_item g-0">
                      <div class="col-5 col-sm-5 col-md-5 col-lg-5 details_name">Collection</div>
                      <div class="col-7 col-sm-7 col-md-7 col-lg-7 details_value">{{ $data->project->collection }}</div>
                    </div>
                    <div class="row single_details_item g-0">
                      <div class="col-5 col-sm-5 col-md-5 col-lg-5 details_name">Launch Date</div>
                      <div class="col-7 col-sm-7 col-md-7 col-lg-7 details_value">{{ $data->project->launch_date }}</div>
                    </div>
                    <div class="row single_details_item g-0">
                      <div class="col-5 col-sm-5 col-md-5 col-lg-5 details_name">Completion Date</div>
                      <div class="col-7 col-sm-7 col-md-7 col-lg-7 details_value">{{ $data->project->completion_date }}
                      </div>
                    </div>
                    <div class="row single_details_item g-0">
                      <div class="col-5 col-sm-5 col-md-5 col-lg-5 details_name">Status</div>
                      <div class="col-7 col-sm-7 col-md-7 col-lg-7 details_value">
                        @php
                          $status = '';
                          if ($data->project->status == '1') {
                              $status = 'ONGOING';
                          }

                          if ($data->project->status == '2') {
                              $status = 'UPCOMING';
                          }

                          if ($data->project->status == '3') {
                              $status = 'COMPLETED';
                          }
                        @endphp
                        {{ $status }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="project_overview" role="tabpanel">
                  <!-- <p class="project_section_title">Overview</p> -->

                  <p class="overview_description">{{ $data->project->description }}</p>

                  <a href="{{ asset('storage/project/brochures/' . $data->project->brochure) }}"
                    class="download_e_brochure_btn">Download E-Brochure</a>
                </div>
                <div class="tab-pane fade" id="project_video_tab" role="tabpanel">
                  <div class="gallery_section p-0">
                    <div class="owl-carousel video-gallery">
                      @foreach ($data->project->videos as $video)
                        <a class="gallery_item" data-aos="flip-right"
                          href="https://www.youtube.com/watch?v={{ $video->url }}">
                          <img src="{{ asset('new_design') }}/assets/img/img/img (10).png" alt="gallery image">
                        </a>
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

  </div>


  <!-- Map section:Start -->
  <div class="map-container" data-aos="fade-up">
    {{-- <iframe scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.792539219271!2d90.39862807514407!3d23.790400887239855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79dade9290f%3A0xc5766572a1eba557!2sAssort%20Housing%20%26%20Engineering%20Ltd!5e0!3m2!1sen!2sbd!4v1693418476531!5m2!1sen!2sbd" width="100%" height="600" frameborder="0"></iframe> --}}
    <iframe scrolling="no" marginheight="0" marginwidth="0" src="{{ $data->project->iframe_code }}" width="100%" height="450" frameborder="0"></iframe>
  </div>
  <!-- Map section:End -->

  <!-- On going project section:Start -->
  <div class="container-fluid similar-project-section">

    <h2 class="section-title">Similar Projects</h2>

    <div class="owl-carousel similar-project-slider">
      @foreach ($data->releted_projects as $item)
        <div class="single-project-container tilt">
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
  <!-- On going project section:End -->
@endsection
