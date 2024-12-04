@extends('front_end.new_design.layouts.master')

@section('title')
  Home
@endsection

@section('content')
  <!-- hero slider:start -->
  <div class="hero-section" data-aos="fade-down">
    <div class="swiper heroSlider">
      <div class="swiper-wrapper">
        @foreach ($data->sliders as $slider)
          <div class="swiper-slide"
            style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.3) 100%), url('{{ asset('storage/slider/image/' . $slider->image) }}');">
            <div class="slide-content">
              {{-- @if ($loop->first)
              <div class="hero-text">
                <h1>
                  <ul>
                    <li style="background-image: url('{{ asset('storage/slider/image/' . $slider->image) }}');">A</li>
                    <li style="background-image: url('{{ asset('storage/slider/image/' . $slider->image) }}');">s</li>
                    <li style="background-image: url('{{ asset('storage/slider/image/' . $slider->image) }}');">s</li>
                    <li style="background-image: url('{{ asset('storage/slider/image/' . $slider->image) }}');">o</li>
                    <li style="background-image: url('{{ asset('storage/slider/image/' . $slider->image) }}');">r</li>
                    <li style="background-image: url('{{ asset('storage/slider/image/' . $slider->image) }}');">t</li>
                  </ul>
                </h1>
                <h3>Housing and Engineering LTD.</h3>
              </div>
              @endif --}}
              
            </div>
          </div>
        @endforeach
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <!-- hero slider:end -->

  <!-- Top CTA Section:Start -->
  <div class="top_cta_section" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-12 d-flex justify-content-center" data-aos="fade-right">
          <div class="top_cta_img_container">
            <img src="{{ asset('storage/pageimage/' . $data->comfortable->feature_image) }}" alt="top cta section image"
              class="top_cta_img w-100">
          </div>
        </div>
        <div class="col-xl-6 col-md-6 col-sm-12 description" data-aos="fade-right">
          <div class="top_cta_video">
            <a class="video_item" href="https://www.youtube.com/watch?v={{ $data->comfortable->video }}">
              <img src="{{ asset('storage/pageimage/' . $data->comfortable->thumbnail) }}" alt="video">
            </a>
          </div>
        </div>
        <div class="col-md-12 cta_written_info" data-aos="zoom-in">

          <p class="top_cta_section_info">About</p>

          <h2 class="top_cta_heading mb-5">{{ $data->comfortable->page_name }}</h2>

          {{-- <p class="top_cta_description mb-5">{!!  $data->comfortable->page_content !!}</p> --}}
          <div class="top_cta_description mb-5">{!! Str::limit($data->comfortable->page_content, 500, ' ...') !!}</div>

          <a href="{{ route('aboutus.index') }}" class="primary_btn">Learn About</a>
        </div>
      </div>

      <div class="testimonial-container" data-aos="fade-up">
        <div class="owl-carousel testimonial-section">
          @foreach ($data->posts as $post)
            <div class="testimonial-item">
              <div class="testimonial_section">
                <div class="rating_star d-flex">
                  @for ($i = 0; $i < 5; ++$i)
                    @if ($post->rate == $i + 0.5)
                      <img src="{{ asset('new_design') }}/assets/img/rating_half.svg" alt="rating star">
                    @elseif($post->rate <= $i)
                      <img src="{{ asset('new_design') }}/assets/img/rating_blank.svg" alt="rating star">
                    @else
                      <img src="{{ asset('new_design') }}/assets/img/rating_full.svg" alt="rating star">
                    @endif
                  @endfor
                </div>

                <div class="feedback">
                  {!! $post->post_description !!}
                </div>

                <div class="testimony_provider">
                  <div class="d-flex">
                    <img src="{{ asset('storage/post_image/' . $post->feature_image) }}" alt="user image">
                    <div class="testimony_provider_info">
                      <div class="name">{!! $post->post_title !!}</div>
                      <div class="designation">Assort Client</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
  <!-- Top CTA Section:End -->


  <div class="project-carousel-container">
    <!-- On going project section:Start -->
    <div class="container-fluid project-carousel-section on-going-section">

      <h2 class="section-title" data-aos="zoom-in">Ongoing Projects</h2>

      <div class="owl-carousel ongoing-project-slider" data-aos="fade-right">
        @foreach ($data->ongoings as $ongoing)
          <div class="single-project-container tilt">
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
    <!-- On going project section:End -->


    <!-- Upcoming project section:Start -->
    <div class="container-fluid project-carousel-section up-coming-section">

      <h2 class="section-title" data-aos="zoom-in">Upcoming Projects</h2>

      <div class="owl-carousel upcoming-project-slider" data-aos="fade-up">
        @foreach ($data->upcomming as $item)
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
    <!-- Upcoming project section:End -->

    <!-- Completed project section:Start -->
    <div class="container-fluid project-carousel-section completed-section">

      <h2 class="section-title" data-aos="zoom-in">Ready Projects</h2>

      <div class="owl-carousel completed-project-slider" data-aos="fade-up">
        @foreach ($data->readys as $ready)
          <div class="single-project-container tilt">
            <a href="{{ route('project.details', $ready->id) }}">
              <div class="single-project">
                <img src="{{ asset('storage/project/images/' . $ready->featured_image) }}" class="project_img"
                  alt="project image">
                <div class="project_info">
                  <!-- <div class="project_name">Assort Villina</div> -->
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
    <!-- Completed project section:End -->
  </div>



  <!-- CTA Section:Start -->
  {{-- <div class="container-fluid p-0" data-aos="fade-up">

    <div class="gallery_section">
      <h2 class="section-title">Image Gallery</h2>
      <div class="container">
        <div class="image-gallery">
          <div class="masonry_container">
            <div class="masonry">
              @foreach ($data->images as $image)
                <a class="brick" href="{{ asset('storage/imagegallery/image/' . $image->image) }}">
                  <div class="gallery_item">
                    <img src="{{ asset('storage/imagegallery/image/' . $image->image) }}" alt="gallery image">
                    <div class="gallery_overlay"></div>
                    <p class="gallery_title">{{ $image->title }}</p>
                  </div>
                </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="gallery_section video_gallery_section homepage" data-aos="fade-up">

      <h2 class="section-title">Video Gallery</h2>

      <div class="container">
        <div class="video-gallery">
          @foreach ($data->videos as $video)
            <a class="gallery_item" href="https://www.youtube.com/watch?v={{ $video->video_url }}">
              <img src="{{ asset('storage/videogallery/image/' . $video->thumbnail) }}" alt="gallery image">
              <div class="gallery_overlay"></div>
              <p class="gallery_title">{{ $video->title }}</p>
            </a>
          @endforeach
        </div>
        <div class="d-flex justify-content-center mt-5 mb-2">
          <a href="{{ route('gallery.video.index') }}" class="primary_btn">View All Videos</a>
        </div>
      </div>
    </div>

    <div class="cta-section container" data-aos="fade-right">
      <div class="row">
        <div class="col-md-12 col-lg-5 col-xl-6 mb-5 mb-lg-0 d-flex justify-content-center">
          <img src="{{ asset('storage/pageimage/' . $data->wanted->feature_image) }}" alt="cta section image"
            class="cta_img">
        </div>
        <div class="col-md-12 col-lg-7 col-xl-6">
          <h2 class="cta_heading mb-5">
            <span class="d-block">{{ $data->wanted->page_name }}</span>
            <span class="highlight">{{ $data->wanted->slug }}</span>
          </h2>

          <div class="cta_description mb-5">{!! Str::limit($data->wanted->page_content, 600, ' ...') !!}</div>

          <a href="{{ route('aboutus.index') }}" class="primary_btn">Learn About</a>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- CTA Section:End -->
@endsection
