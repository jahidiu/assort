<header>
  <nav class="navbar navbar-expand-lg" id="header">
    <div class="container-fluid px-0 py-3 py-lg-0">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('storage/site/'.session()->get('settings')->general_settings->site_logo) }}" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}" href="{{ route('aboutus.index') }}">About Us</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link {{ request()->is('ready') ? 'active' : '' }}" href="{{ route('ready.index') }}">Ready Flat</a>
          </li> --}}
          <li class="nav-item dropdown">
            <a class="nav-link {{ request()->is('projects') ? 'active' : '' }}" href="#" role="button">Projects</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('projects') }}">Ongoing Project</a></li>
              <li><a class="dropdown-item" href="{{ route('projects') }}">Upcoming Project</a></li>
              <li><a class="dropdown-item" href="{{ route('projects') }}">Ready Project</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('handover-projects') ? 'active' : '' }}" href="{{ route('hprojects') }}">Hand Over Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('gallery/photo') ? 'active' : '' }}" href="{{ route('gallery.photo.index') }}">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}" href="{{ route('contactus.index') }}">Contact</a>
          </li>
        </ul>

        <div class="header-phone-number ms-auto">
          <a href="javascript:0"><img src="{{ asset('new_design') }}/assets/img/phone_icon.svg" alt=""> +8801711535262</a>
        </div>

      </div>
    </div>
  </nav>
</header>

<!-- modal -->

@include('front_end.new_design.includes.modal')