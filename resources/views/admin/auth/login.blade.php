{{-- @extends('layouts.app')

@section('content')
<div class="container">

    <form method="POST" action="{{route('admin.login_post')}}">
@csrf
<div class="form-group">
    <p>Email</p>
    <input class="form-control" name="email" type="email" required value="">
</div>

<div class="form-group">
    <p>Password</p>
    <input class="form-control" name="password" type="password" required>
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">Login</button>
</div>
</form>
</div>
@endsection --}}

@include('layouts.header')
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
</style>
<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->



<div class="splash-container">

    @include('layouts.errors')

    <div class="card ">

        <div class="card-header text-center">

            @if (isset(session()->get('settings')->general_settings->site_logo))

            <a href="/">
                <img style="width:150px; margin-top: 0px;" class="logo"
                    src=" {{ asset('storage/site/'.session()->get('settings')->general_settings->site_logo) }} " alt="">
            </a>

            @else

            <h1>Kitchen</h1>

            @endif
            <span class="splash-description">Please enter your
                user information.</span>
        </div>
        <div class="card-body">
            <form action=" {{ route('admin.login_post') }} " method="POST">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <input name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                            id="uname" type="text" placeholder="Username" value="admin@kitchen.com" autocomplete="off" autofocus required>
                    </div>
                </div>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <input class="form-control form-control-lg @error('password') is-invalid @enderror"
                            id="password" type="password" name="password" value="bad6c5d9e535b7b1b057" required placeholder="Password">
                    </div>
                </div>


                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="remember" id="remember" type="checkbox"
                            {{ old('remember') ? 'checked' : '' }}><span class="custom-control-label">Remember
                            Me</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
            </form>
        </div>



        {{-- @if (Route::has('password.request')) --}}
        <div class="card-footer bg-white p-0 text-center">

            <div class="card-footer-item card-footer-item-bordered">
                <a href="" class="footer-link">Forgot Password</a>
            </div>

            @if (session()->get('settings')->user_settings->new_user_register == 1)
            <div class="card-footer-item card-footer-item-bordered">
                <a href="/kt-register" class="footer-link">Register for account</a>
            </div>
            @endif

        </div>


        {{-- @endif --}}

    </div>
</div>

@include('layouts.footer')