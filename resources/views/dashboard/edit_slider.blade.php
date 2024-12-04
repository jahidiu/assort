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
                        <h2 class="pageheader-title">Edit Slider</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/kt-admin/slider"
                                            class="breadcrumb-link">Sliders</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
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
                        <h4 class="card-header text-success">Edit Slider</h4>
                        <div class="card-body">
                            <form action=" {{ route('slider.update', [$data->slider->id]) }} " method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="text1" type="text" class="form-control"
                                                placeholder="Slider Text 1" value="{{ $data->slider->text1 }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="text2" type="text" class="form-control"
                                                placeholder="Slider Text 1" value="{{ $data->slider->text2 }}">
                                        </div>
                                    </div>
                                </div>

                                <img class="img-fluid slider-list-image mb-1"
                                    src="{{ asset('storage/slider/image/'.$data->slider->image) }}" alt="Not Found">

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-images"></i></span>
                                            </div>
                                            <input name="s_img" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-video"></i></span>
                                            </div>
                                            <input name="video" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <label class="custom-control custom-checkbox">
                                    <input name="is_active" type="checkbox" class="custom-control-input"
                                        @if($data->slider->is_active)
                                    {{ 'checked' }}
                                    @endif >
                                    <span class="custom-control-label">Active</span>
                                </label>

                                <div class="form-row float-right">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("layouts.footer")