{{-- navbar start --}}

<div class="position-relative nav-index">

    <div class="container-fluid px-md-5 pr-2 pl-2">

        <div class="position-absolute sub_title d-none d-md-block">
            <p>HOTLINE 01711535262, 01731679682, 01729596322</p>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light pr-0">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('storage/site/'.session()->get('settings')->general_settings->site_logo) }}"
                     class="img-fluid" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse mt-47" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aboutus.index') }}">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ready.index') }}">READY FLAT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ongoing.index') }}">ONGOING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('upcomming.index') }}">UPCOMING</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hprojects') }}">HAND OVER</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            GALLLERY
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('gallery.photo.index') }}">Photo</a>
                            <a class="dropdown-item" href="{{ route('gallery.client.index') }}">Our client speak for us</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contactus.index') }}">CONTACT</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

</div>

{{-- navbar end --}}