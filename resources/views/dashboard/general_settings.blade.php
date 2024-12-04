@include("layouts.header")
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    @include("layouts.navbar")
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    @include("layouts.leftsidebar")
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">{{ __('messages.ln14')}}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{ __('messages.ln1')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.ln14')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 offset-md-2">
                    @include('layouts.errors')
                    <div class="card">
                        <h5 class="card-header">{{ __('messages.ln80')}}</h5>
                        <div class="card-body">
                            <div class="">
                                @if ($data->gsettings->site_logo == null)
                                    <h1 class="d-block">{{$data->gsettings->site_name}}</h1>
                                @else
                                    <img class="mr-3 logo responsive_logo"
                                        src="{{ asset('storage/site/'.$data->gsettings->site_logo) }}"
                                        alt="Image not Found">
                                    <img class="mr-3 logo responsive_logo"
                                        src="{{ asset('storage/site/'.$data->gsettings->celebration_img) }}"
                                        alt="Image not Found">
                                @endif

                                <form action=" {{ route('general_view') }} " method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="media-body mt-3">
                                        <input type="file" name="site_logo" class="form-control btn btn-success">
                                        <p class="mt-2">{{ __('messages.ln81')}}</p>
                                    </div>
                                    <div class="media-body mt-3">
                                        <input type="file" name="celebration_img" class="form-control btn btn-success">
                                        <p class="mt-2">{{ __('messages.ln180')}}</p>
                                    </div>

                                    <div class="form-group mt-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">
                                                    {{ __('messages.ln82')}}
                                                </span>
                                            </div>
                                            <input name="site_name" value=" {{ $data->gsettings->site_name }} "
                                                class="form-control form-control-lg" id="username" type="text"
                                                placeholder="Site name" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">
                                                    {{ __('messages.ln83')}}
                                                </span>
                                            </div>
                                            <input name="site_title" value=" {{ $data->gsettings->site_title }} "
                                                class="form-control form-control-lg" id="password" type="text"
                                                placeholder="Site Title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">
                                                    {{ __('Short info')}}
                                                </span>
                                            </div>
                                            <input name="short_info" value=" {{ $data->gsettings->short_info }} "
                                                class="form-control form-control-lg" id="password" type="text"
                                                placeholder="Short information">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">
                                                    {{ __('messages.ln84')}}
                                                </span>
                                            </div>
                                            <input name="footer_text" value=" {{ $data->gsettings->footer_text }} "
                                                class="form-control form-control-lg" id="password" type="text"
                                                placeholder="Footer Text">
                                        </div>
                                    </div>

                                    <button type="submit"
                                        class="btn btn-primary float-right">{{ __('messages.ln73')}}</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                @include("layouts.footer")