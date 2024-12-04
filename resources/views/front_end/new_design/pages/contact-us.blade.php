@extends('front_end.new_design.layouts.master')

@section('title') Contact Us @endsection

@section('content')

<!-- Page title section:Start -->
<div class="page-header">Contact Us</div>
<!-- Page title section:End -->

<!-- Map section:Start -->
<div class="map-container" data-aos="fade-up">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.792539219271!2d90.39862807514407!3d23.790400887239855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79dade9290f%3A0xc5766572a1eba557!2sAssort%20Housing%20%26%20Engineering%20Ltd!5e0!3m2!1sen!2sbd!4v1693418476531!5m2!1sen!2sbd"
    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- Map section:End -->

<!-- Contact form section:Start -->
<div class="contact-form-section" data-aos="fade-up">
  <div class="container">
    <div class="row">
      {{-- <div class="col-lg-6 col-md-12" data-aos="fade-right">
        <h2 class="form-title"><span>Get In</span><span class="highlight">Touch</span></h2>
        <div class="form-title-separator"></div>

        <p class="contact-brief">{!! Session('settings')->general_settings->short_info !!}</p>

        <div class="contact-info-block">
          <div class="d-flex">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="33" height="45" viewBox="0 0 33 45" fill="none">
                <path
                  d="M16.5 21.375C14.9845 21.375 13.531 20.7824 12.4594 19.7275C11.3878 18.6726 10.7857 17.2418 10.7857 15.75C10.7857 14.2582 11.3878 12.8274 12.4594 11.7725C13.531 10.7176 14.9845 10.125 16.5 10.125C18.0155 10.125 19.469 10.7176 20.5406 11.7725C21.6122 12.8274 22.2143 14.2582 22.2143 15.75C22.2143 16.4887 22.0665 17.2201 21.7793 17.9026C21.4921 18.5851 21.0712 19.2051 20.5406 19.7275C20.01 20.2498 19.3801 20.6641 18.6868 20.9468C17.9935 21.2295 17.2504 21.375 16.5 21.375ZM16.5 0C12.2565 0 8.18687 1.65937 5.18629 4.61307C2.18571 7.56677 0.5 11.5728 0.5 15.75C0.5 27.5625 16.5 45 16.5 45C16.5 45 32.5 27.5625 32.5 15.75C32.5 11.5728 30.8143 7.56677 27.8137 4.61307C24.8131 1.65937 20.7435 0 16.5 0Z"
                  fill="#00A1E4" />
              </svg>
            </div>
            <div class="info">
              <div class="title">Office Address</div>
              <div class="contact-info">{!! Session('settings')->contact_settings->address !!}</div>
            </div>
          </div>

          <div class="d-flex">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" viewBox="0 0 35 34" fill="none">
                <path
                  d="M7.03889 14.4886C9.83889 19.7522 14.35 24.0671 19.8528 26.7454L24.1306 22.6536C24.675 22.1329 25.4333 21.9841 26.1139 22.1886C28.2917 22.8768 30.625 23.2488 33.0556 23.2488C33.5713 23.2488 34.0658 23.4447 34.4305 23.7935C34.7951 24.1423 35 24.6154 35 25.1087V31.6184C35 32.1116 34.7951 32.5847 34.4305 32.9335C34.0658 33.2823 33.5713 33.4783 33.0556 33.4783C24.2887 33.4783 15.8809 30.147 9.68175 24.2175C3.48263 18.2879 0 10.2456 0 1.8599C0 1.36663 0.20486 0.893553 0.569515 0.544753C0.934169 0.195953 1.42875 0 1.94444 0H8.75C9.2657 0 9.76027 0.195953 10.1249 0.544753C10.4896 0.893553 10.6944 1.36663 10.6944 1.8599C10.6944 4.18478 11.0833 6.41667 11.8028 8.49976C12.0167 9.15072 11.8611 9.87609 11.3167 10.3969L7.03889 14.4886Z"
                  fill="#00A1E4" />
              </svg>
            </div>
            <div class="info">
              <div class="title">Call Us</div>
              <div class="contact-info">{!! Session('settings')->contact_settings->phone !!}</div>
            </div>
          </div>

          <div class="d-flex">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="45" height="46" viewBox="0 0 45 46" fill="none">
                <path
                  d="M37.5 34.2283H33.75V17.822L22.5 24.8533L11.25 17.822V34.2283H7.5V11.7283H9.75L22.5 19.697L35.25 11.7283H37.5M37.5 7.97827H7.5C5.41875 7.97827 3.75 9.64702 3.75 11.7283V34.2283C3.75 35.2228 4.14509 36.1767 4.84835 36.8799C5.55161 37.5832 6.50544 37.9783 7.5 37.9783H37.5C38.4946 37.9783 39.4484 37.5832 40.1516 36.8799C40.8549 36.1767 41.25 35.2228 41.25 34.2283V11.7283C41.25 9.64702 39.5625 7.97827 37.5 7.97827Z"
                  fill="#00A1E4" />
              </svg>
            </div>
            <div class="info">
              <div class="title">Mail Us</div>
              <div class="contact-info">{!! Session('settings')->contact_settings->email !!}<br> www.assorthousing.com</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 mt-5 mt-lg-0" data-aos="fade-right">
        <div class="contact-form">
          <form action="{{ route('contactus.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="mb-3">
                  <label for="full_name" class="form-label">Full Name <span class="required">*</span></label>
                  <input type="text" name="name" placeholder="Enter your full name" class="form-control input-field">
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="mb-3">
                  <label for="full_name" class="form-label">Phone Number <span class="required">*</span></label>
                  <input type="number" name="phone" placeholder="Enter your phone number" class="form-control input-field">
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="mb-3">
                  <label for="full_name" class="form-label">Email <span class="required">*</span></label>
                  <input type="text" name="email" placeholder="Enter your email" class="form-control input-field">
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="mb-3">
                  <label for="full_name" class="form-label">What is your enquiry about? <span
                      class="required">*</span></label>
                  <input type="text" name="subject" placeholder="Enter  Subject" class="form-control input-field">
                </div>
              </div>
              <div class="col-md-12 mb-5">
                <div class="mb-3">
                  <label for="full_name" class="form-label">Additional information <span
                      class="required">*</span></label>
                  <textarea class="form-control input-field w-100 message" name="message" placeholder="Your message"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <input type="submit"  class="secondary_btn" value="Send Message">
              </div>
            </div>
          </form>
        </div>
      </div> --}}
    </div>
  </div>

</div>
<!-- Contact form section:End -->


@endsection