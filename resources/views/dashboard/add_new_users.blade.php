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
                        <h2 class="pageheader-title text-primary">{{ __('messages.ln5')}} </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{ __('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item"><a href="/kt-admin/user"
                                            class="breadcrumb-link">{{ __('messages.ln2')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.ln5')}}</li>
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
                        <h4 class="card-header text-success">{{ __('messages.ln5')}}</h4>
                        <div class="card-body">
                            <form action=" {{ route('user.store') }} " method="POST" class="needs-validation"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="fname" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln41')}}"
                                                aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please choose a firstname.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="lname" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln42')}}"
                                                aria-describedby="inputGroupPrepend" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="uname" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln45')}}"
                                                aria-describedby="inputGroupPrepend" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-envelope"></i></span>
                                            </div>
                                            <input name="email" type="email" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln163')}}"
                                                aria-describedby="inputGroupPrepend" required>

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-key"></i></span>
                                            </div>
                                            <input name="password" type="password" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln46')}}"
                                                aria-describedby="inputGroupPrepend" required>

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-key"></i></span>
                                            </div>
                                            <input name="password_confirmation" type="password" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln47')}}"
                                                aria-describedby="inputGroupPrepend" required>

                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    id="inputGroupPrepend">{{ __('messages.ln67')}}</span>
                                            </div>
                                            <select name="user_group" class="custom-select">

                                                @foreach ($data->groups as $group)
                                                @if ($group->id != 1)
                                                <option value="{{ $group->id }}"> {{ $group->group_name }} </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fas fa-file-image"></i></span>
                                            </div>
                                            <input name="profile_picture" type="file" class="form-control"
                                                title="Upload Your Profile Picture" id="validationCustomUsername"
                                                aria-describedby="inputGroupPrepend">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row float-right">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button class="btn btn-primary " type="submit">{{ __('messages.ln65')}}</button>
                                        <button class="btn btn-danger " type="reset">{{ __('messages.ln66')}}</button>
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