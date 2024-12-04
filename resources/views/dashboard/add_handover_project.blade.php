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
                                Add Handover Project
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
                            <h5 class="card-header">Add Handover Project</h5>
                            <div class="card-body">
                                <div class="">

                                    <form action=" {{ route('handover-project.store') }} " method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>

                                        <div class="form-group">
                                            <label>Project Address</label>
                                            <input type="text" class="form-control" name="address">
                                        </div>

                                        <div class="form-group">
                                            <label>No of Flat</label>
                                            <input type="text" class="form-control" name="no_of_flat">
                                        </div>

                                        <div class="form-group">
                                            <label>No of Storied</label>
                                            <input type="text" class="form-control" name="no_of_storied">
                                        </div>

                                        <div class="form-group">
                                            <label>Handover Date</label>
                                            <input type="text" class="form-control" name="handover_date">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Sorting Number</label>
                                            <input type="number" min="1" class="form-control" value="{{ old('sort_number') }}" name="sort_number">
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