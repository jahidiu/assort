@include("layouts.header")
<style>
    .table th,
    .table td {
        text-align-last: left !important;
        padding-left: 30px !important;
    }
</style>
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
                        <h2 class="pageheader-title text-primary">{{ __('messages.ln8')}} </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{ __('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item"><a href="/kt-admin/group"
                                            class="breadcrumb-link">{{ __('messages.ln67')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.ln8')}}</li>
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
                <div class="col-md-10 col-sm-12 col-12 offset-md-1">
                    @include('layouts.errors')
                    <div class="card">
                        <h4 class="card-header text-success">{{ __('messages.ln8')}}</h4>
                        <div class="card-body">
                            <form action=" {{ route('group.store') }} " method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <!--<label for="validationCustomUsername">First name</label>-->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="fa fa-pencil-alt"></i></span>
                                            </div>
                                            <input name="group_name" type="text" class="form-control"
                                                id="validationCustomUsername" placeholder="{{ __('messages.ln68')}}"
                                                required>

                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="card">
                                            <h4 class="card-header text-danger">{{ __('messages.ln9')}}</h4>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table text-center">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">
                                                                    {{ __('messages.ln70')}}
                                                                </th>
                                                                <th scope="col">{{ __('messages.ln71')}}</th>
                                                                <th scope="col">{{ __('messages.ln72')}}</th>
                                                                <th scope="col">{{ __('messages.ln73')}}</th>
                                                                <th scope="col">{{ __('messages.ln74')}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <input type="checkbox" id="sAll"> All
                                                                </th>
                                                                <th>
                                                                    <input type="checkbox" id="sView"> All
                                                                </th>
                                                                <th>
                                                                    <input type="checkbox" id="sAdd"> All
                                                                </th>
                                                                <th>
                                                                    <input type="checkbox" id="sUpdate"> All
                                                                </th>
                                                                <th>
                                                                    <input type="checkbox" id="sDelete"> All
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($data->modules as $module)
                                                            <tr>
                                                                <td>
                                                                    {{ $module->module_name }}
                                                                </td>

                                                                <td>
                                                                    <div class="form-check">
                                                                        <input name="permissions[]"
                                                                            class="form-check-input position-static"
                                                                            type="checkbox" id="{{ $module->id }}-1"
                                                                            value="{{ $module->id }}-1">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-check">
                                                                        <input name="permissions[]"
                                                                            class="form-check-input position-static"
                                                                            type="checkbox" id="{{ $module->id }}-2"
                                                                            value="{{ $module->id }}-2">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-check">
                                                                        <input name="permissions[]"
                                                                            class="form-check-input position-static"
                                                                            type="checkbox" id="{{ $module->id }}-3"
                                                                            value="{{ $module->id }}-3">
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="form-check">
                                                                        <input name="permissions[]"
                                                                            class="form-check-input position-static"
                                                                            type="checkbox" id="{{ $module->id }}-4"
                                                                            value="{{ $module->id }}-4">
                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            @endforeach


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row float-right">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <button class="btn btn-primary" type="submit">{{ __('messages.ln65')}}</button>
                                        <button class="btn btn-danger" type="submit">{{ __('messages.ln66')}}</button>
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