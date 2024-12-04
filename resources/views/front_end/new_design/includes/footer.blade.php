<style>
  footer .contact_links {
    padding-left: 0px;

    li {
      list-style: none;
      padding: 10px 0px;

      a {
        color: white;
        text-decoration: none;

        &:hover {
          color: #00a1e4;
        }

        i {
          margin-right: 10px
        }
      }
    }
  }
</style>

<footer>
  <div class="floating-whtasapp">
    <a href="https://api.whatsapp.com/send?phone={{ Session('settings')->contact_settings->whatsapp_number }}" class="whats_app_link" target="_blank">
      <i class="fab fa-whatsapp"></i>
    </a>
  </div>

  <div class="social-section">
    <ul>
      <li><a href="{{ Session('settings')->contact_settings->facebook }}">
          <i class="fab fa-facebook-f"></i>
        </a></li>
      <li><a href="{{ Session('settings')->contact_settings->youtube }}">
          <i class="fab fa-youtube"></i>
        </a></li>
      <li><a href="{{ Session('settings')->contact_settings->twitter }}">
          <i class="fab fa-twitter"></i>
        </a></li>
      <li><a href="{{ Session('settings')->contact_settings->linkedin }}">
          <i class="fab fa-linkedin"></i>
        </a></li>
    </ul>
  </div>

  <div class="container-fluid position-relative p-0">
    <div class="row footer_query_form_section">
      <div class="col-md-12" data-aos="zoom-in">
        <h3 class="footer_section_title mb-0 text-center">
          Your Query
        </h3>

        <div class="footer_query_form" data-aos="zoom-in">
          <form action="{{ route('contactus.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-4 col-sm-6 mb-2">
                <label class="footer-input-field">
                  <input type="text" name="name" placeholder=" " class="footer_input" required />
                  <span class="footer_input_placeholder">Full Name *</span>
                </label>
              </div>
              <div class="col-md-4 col-sm-6 mb-2">
                <label class="footer-input-field">
                  <input type="number" name="phone" placeholder=" " class="footer_input" required />
                  <span class="footer_input_placeholder">Phone Number *</span>
                </label>
              </div>
              <div class="col-md-4 col-sm-6 mb-2">
                <label class="footer-input-field">
                  <input type="email" name="email" placeholder=" " class="footer_input" required />
                  <span class="footer_input_placeholder">Email *</span>
                </label>
              </div>
              <div class="col-md-12 col-sm-6 mb-2">
                <label class="footer-input-field">
                  <input type="text" name="subject" placeholder=" " class="footer_input" required />
                  <span class="footer_input_placeholder">What is your enquiry? *</span>
                </label>
              </div>
              <div class="col-md-12 mb-2">
                <label class="footer-input-field">
                  <textarea class="input-field w-100 message footer_input" name="message" placeholder=" " required></textarea>
                  <span class="footer_input_placeholder">Additional information *</span>
                </label>
              </div>

              <div class="col-md-12">
                <input type="submit" class="secondary_btn  d-block w-100 footer_send_message" value="Send Message">
                {{-- <button type="submit" class="secondary_btn d-block w-100 footer_send_message">Send Message</button> --}}
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="footer_top">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 about_section">
          <h3 class="footer_section_title">
            <i class="far fa-question-circle"></i> About Us
          </h3>
          <p class="brief_about_us">{!! Session('settings')->general_settings->short_info !!}</p>
          <p class="brief_about_us">{!! Session('settings')->contact_settings->linkedin !!}</p>
        </div>
        @php
          $contact_str = Session('settings')->contact_settings->phone;
          $str = 'Hello world';
          $contact_no = explode(',', $contact_str);
          // @dd($contact_no);
        @endphp
        <div class="col-xl-5 col-lg-12 contact_section">
          <h3 class="footer_section_title">
            <i class="fas fa-id-card"></i> Contact Information
          </h3>
          <div class="row flex-wrap">
            <div class="col-sm-5">
              <ul class="contact_links">
                @foreach ($contact_no as $item)
                  <li><a href="tel:{{ trim($item) }}"><i
                        class="fas fa-phone-alt"></i></i><span>{{ trim($item) }}</span></a></li>

                  @if ($loop->iteration == 5)
              </ul>
            </div>
            <div class="col-sm-7">
              <ul class="contact_links">
                @endif
                @endforeach
                <li><a href="mailto:assorthousing@gmail.com"><i
                      class="fas fa-envelope"></i><span>{{ Session('settings')->contact_settings->email }}</span></a>
                </li>
                <li><a href="http://www.assorthousing.com:"><i
                      class="fas fa-globe"></i><span>www.assorthousing.com</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-md-6 address_section">
          <h3 class="footer_section_title">
            <i class="fas fa-search-location"></i> Address
          </h3>
          <p class="address"><i class="fas fa-location-arrow"></i> {!! Session('settings')->contact_settings->address !!}</p>
        </div>
      </div>
    </div>
  </div>

  <!-- footer links:Start -->
  <div class="footer_bottom_links">
    <div class="copyright_text text-center">
      {!! Session('settings')->general_settings->footer_text !!}
    </div>
  </div>
  <!-- footer links:End -->
</footer>
