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
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title text-center">
                                Edit Management
                            </h2>
                        </div>
                    </div>
                </div>
                
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                
                

                <!-- ============================================================== -->
                <!-- Home Content Start   -->
                <!-- ============================================================== -->
                
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 offset-md-2">
                        @include('layouts.errors')
                        <div class="card">
                            <h5 class="card-header">Edit Management</h5>
                            <div class="card-body">
                                <div class="">

                                    <form action=" {{ route('management.update', $data->management->id) }} " method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$data->management->name}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" name="designation"  value="{{$data->management->designation}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control" name="description"  value="{{$data->management->description}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="{{$data->management->email}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>


                                        <button type="submit"
                                            class="btn btn-primary float-right">{{ __('messages.ln73')}}</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- ============================================================== -->
                    <!-- Home Content End   -->
                    <!-- ============================================================== -->

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->



            @include("layouts.footer")