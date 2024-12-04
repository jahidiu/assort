<div class="modal fade" id="anniversaryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <a href="#" data-bs-dismiss="modal">
        <svg xmlns="http://www.w3.org/2000/svg" width="49" height="49" viewBox="0 0 49 49" fill="none">
          <rect width="49" height="49" rx="24.5" fill="#F7941E" />
          <path
            d="M30.2892 34L24.5846 26.4229H24.0031L16.3323 17H20.0985L25.8308 24.14H26.4123L34 34H30.2892ZM16 34L23.3662 24.9171L25.5538 26.5443L19.5723 34H16ZM26.6338 25.8643L24.4462 24.2371L30.0954 17H33.6677L26.6338 25.8643Z"
            fill="white" />
        </svg>
      </a>
      <div class="modal-body">
        <div class="celebration_image">
          <img src="{{ asset('storage/site/'.session()->get('settings')->general_settings->celebration_img) }}" alt="">
        </div>
        <div class="logo-container">
          <img src="{{ asset('storage/site/'.session()->get('settings')->general_settings->site_logo) }}" alt="logo">
        </div>
      </div>
    </div>
  </div>
</div>