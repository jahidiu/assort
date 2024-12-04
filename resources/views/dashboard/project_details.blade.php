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
                                {{ $data->project->title }} Details
                            </h2>

                            <div class="mt-5">
                                <a href="{{ route('project_video.list', $data->project->id) }}"
                                    class="btn btn-primary mx-2 float-right">Videos</a>
                                <a href="{{ route('project_fplan.list', $data->project->id) }}"
                                    class="btn btn-primary mx-2 float-right">Floor Plans</a>
                                <a href="{{ route('project_image.list', $data->project) }}"
                                    class="btn btn-primary mx-2 float-right">Images</a>
                            </div>
                            <div class="mb-5"></div>
                        </div>
                    </div>
                </div>
                
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                
                
                
                <!-- ============================================================== -->
                <!-- Home Content Start   -->
                <!-- ============================================================== -->
                
                <div class="row mt-5">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 offset-md-2">
                        @include('layouts.errors')
                        <div class="card">
                            <h5 class="card-header">{{ $data->project->title }} details</h5>
                            <div class="card-body">
                                <div class="">

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $data->project->title }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $data->project->address }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Type Of Project</label>
                                        <input type="text" class="form-control" name="type_of_project"
                                            value="{{ $data->project->type_of_project }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Built Up Area</label>
                                        <input type="text" class="form-control" name="built_up_area"
                                            value="{{ $data->project->built_up_area }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Number Of Floors</label>
                                        <input type="text" class="form-control" name="number_of_floors"
                                            value="{{ $data->project->number_of_floors }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Apartment/Floor</label>
                                        <input type="text" class="form-control" name="apartment_floor"
                                            value="{{ $data->project->apartment_floor }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Size</label>
                                        <input type="text" class="form-control" name="size"
                                            value="{{ $data->project->size }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Bedroom</label>
                                        <input type="text" class="form-control" name="bedroom"
                                            value="{{ $data->project->bedroom }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Bathroom</label>
                                        <input type="text" class="form-control" name="bathroom"
                                            value="{{ $data->project->bathroom }}" readonly>
                                    </div>


                                    <div class="form-group">
                                        <label>Collection</label>
                                        <input type="text" class="form-control" name="collection"
                                            value="{{ $data->project->collection }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Launch Date</label>
                                        <input type="text" class="form-control" name="launch_date"
                                            value="{{ $data->project->launch_date }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Completion Date</label>
                                        <input type="text" class="form-control" name="completion_date"
                                            value="{{ $data->project->completion_date }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        @php
                                            $status = '';
                                       
                                        if ($data->project->status == "1")
                                            $status = 'ONGOING';
                                        
                                        if ($data->project->status == "2")
                                            $status = 'UPCOMING';
                                        
                                        if ($data->project->status == "3")
                                            $status = 'COMPLETED';
                                        
                                        @endphp
                                        <input type="text" class="form-control" name="status"
                                            value="{{ $status }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Iframe Code</label>
                                        <input type="text" class="form-control" name="iframe_code"
                                            value="{{ $data->project->iframe_code }}" readonly>
                                    </div>

                                    <img src="{{ asset('storage/project/images/' .$data->project->featured_image) }}"
                                        style="width: 100px;" alt="Project Image" readonly>

                                    <div class="form-group">
                                        <label>Featured Image</label>
                                        <input type="file" class="form-control" name="featured_image" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Brochure</label>
                                        <input type="file" class="form-control" name="brochure" readonly>
                                    </div>

                                    {{-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_active"
                                            id="is_active" @if ($data->project->is_active)
                                        checked
                                        @endif readonly>
                                        <label class="form-check-label" for="is_active">
                                            Is OnGoing
                                        </label>
                                    </div> --}}

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