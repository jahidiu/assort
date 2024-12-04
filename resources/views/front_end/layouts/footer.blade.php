{{-- contact start --}}


<div class="contact">
  <div class="container2">
    <div class="row">
      <div class="col-lg-4" data-aos="flip-left" data-aos-duration="2000">
        <h1 class="contact-title">OFFICE ADDRESS</h1>

        <p>{!! Session('settings')->contact_settings->address !!}</p>
        <br>
        <p>{!! Session('settings')->contact_settings->phone !!}</p>
        <p>{{ Session('settings')->contact_settings->email }}</p>
        <p>{{ Session('settings')->contact_settings->instagram }}</p>
        <p>{!! Session('settings')->contact_settings->linkedin !!}</p>

      </div>
      <div data-aos="fade-down" data-aos-duration="2000" class="col-lg-3">
        <h1 class="contact-title">QUICK LINKS</h1>

        <ul class="list-unstyled flist">
          <li>
            <a href="{{ route('home') }}">HOME</a>
          </li>
          <li>
            <a href="{{ route('aboutus.index') }}">ABOUT US</a>
          </li>
          <li>
            <a href="{{ route('hprojects') }}">HANDOVER PROJECTS</a>
          </li>
          <li>
            <a href="{{ route('gallery.client.index') }}">CUSTOMER TESTIMONIAL</a>
          </li>
          <li>
            <a href="{{ route('gallery.photo.index') }}"> GALLERY</a>
          </li>
          <li>
            <a href="#">NEWS</a>
          </li>
          <li>
            <a href="#">EVENTS</a>
          </li>
          {{-- <li>
            <a href="#">CAREER</a>
          </li> --}}
        </ul>
      </div>

      <div data-aos="flip-right" data-aos-duration="2000" class="col-lg-5">
        <h1 class="contact-title">YOUR QUERY</h1>

        <div class="contane2">
          <form action="{{ route('contactus.store') }}" method="POST">
            @csrf

            <div class="row">
              <div class="col-md-6 mt-4">
                <input type="text" class="textinp" name="name" placeholder="Your name *">
              </div>
              <div class="col-md-6 mt-4">
                <input type="email" class="textinp" name="email" placeholder="Email Address *">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mt-4">
                <input type="text" class="textinp" name="subject" placeholder="Subject">
              </div>
              <div class="col-md-6 mt-4">
                <input type="text" class="textinp" name="phone" placeholder="Phone">
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mt-4">
                <textarea style="height: 180px;" name="message" class="textinp" placeholder="Your Suggestion"></textarea>
              </div>
            </div>


            <div class="row mt-4">
              <div class="col-md-5">
                <button type="submit" class="contact-btn">SUBMIT</button>
              </div>
            </div>

          </form>
        </div>

      </div>

    </div>
  </div>
</div>

{{-- contact end --}}

{{-- social footer start --}}

<div class="sfooter">
  <div class="container2">
    <div class="row">
      <div class="col-md-4">
        <p> {!! Session('settings')->general_settings->footer_text !!}</p>
      </div>
      <div class="col-md-4">
        <a href="#">Privacy</a> | <a href="#">Terms and Condition</a> | <a href="{{ route('disclaimer.index') }}">Disclaimer</a>
      </div>
      <div class="col-md-4">
        <div class="socials">
          <div class="social">
            <a href="{{ Session('settings')->contact_settings->facebook }}">
              <i class="fab fa-facebook-f"></i>
            </a>
          </div>
          <div class="social">
            <a href="{{ Session('settings')->contact_settings->twitter }}">
              <i class="fab fa-twitter"></i>
            </a>
          </div>
          <div class="social">
            <a href="{{ Session('settings')->contact_settings->linkedin }}">
              <i class="fab fa-linkedin"></i>
            </a>
          </div>
          <div class="social">
            <a href="{{ Session('settings')->contact_settings->youtube }}">
              <i class="fab fa-youtube"></i>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<a href="https://api.whatsapp.com/send?phone={{ Session('settings')->contact_settings->whatsapp_number }}"
  class="btn sticky-btn-round whatsapp" target="_blank"><i class="fab fa-whatsapp"></i>
</a>
<a href="{{ route('contactus.index') }}" class="btn sticky-btn-round"><i class="fas fa-envelope"></i>
</a>
