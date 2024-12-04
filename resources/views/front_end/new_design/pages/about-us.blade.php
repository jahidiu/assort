@extends('front_end.new_design.layouts.master')

@section('title') About US @endsection

@section('content')

<!-- Page title section:Start -->
<div class="page-header">About Us</div>
<!-- Page title section:End -->

<!-- About Page Section:Start -->
<div class="about-us-section" data-aos="fade-up">
	<div class="container">

		<div class="container top_cta_section" data-aos="fade-up">
			<div class="row g-5">
				<div class="col-xl-6 col-lg-6 col-sm-6 d-flex justify-content-center" data-aos="fade-right">
					<div class="top_cta_img_container">
						<img src="{{ asset('storage/pageimage/'. $data->page1->feature_image ) }}" alt="top cta section image" class="top_cta_img w-100">
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-sm-6 description" data-aos="fade-right">

					<p class="top_cta_section_info">About</p>

					<h2 class="top_cta_heading mb-5">{{ $data->page1->page_name }}</h2>

					{{-- <p class="top_cta_description about-us mb-0">{!! $data->page1->page_content !!}</p> --}}
					<div class="top_cta_description about-us mb-0">{!! $data->page1->page_content !!}</div>
				</div>
			</div>

			<div class="container about-info-section" data-aos="fade-up">
				<div class="row">
					<div class="col-lg-6" data-aos="zoom-in">
						{{-- <p class="about-text">{!! $data->page2->page_content !!}</p> --}}
						<div class="about-text">{!! $data->page2->page_content !!}</div>
					</div>
					<div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in">
						<img src="{{ asset('storage/pageimage/'. $data->page2->feature_image ) }}" class="about_section_image w-100" alt="about section image">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="team-member-section" data-aos="fade-up">
		<div class="row">
			@foreach($data->managements as $management)
				<div class="col-6 col-md-4 col-lg-4 col-xl-3 mb-4 mb-xl-0">
					<div class="single-team-member" data-aos="flip-right">
						<img src="{{asset('storage/management/image/'. $management->image)}}" alt="team member image">
						<div class="member-info-container">
							<div class="member-name">
								{{$management->name}}
							</div>
							<div class="member-designation">{{$management->designation}}</div>
						</div>
					</div>
				</div>
			@endforeach

		</div>
	</div>
</div>
<!-- About Page Section:End -->

@endsection