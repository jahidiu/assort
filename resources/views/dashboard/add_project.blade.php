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
                                Add new Project
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
                            <h5 class="card-header">Add new Project</h5>
                            <div class="card-body">
                                <div class="">

                                    <form action=" {{ route('project.store') }} " method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" value="{{ old('title') }}" name="title">
                                        </div>

                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" value="{{ old('address') }}" name="address">
                                        </div>

                                        <div class="form-group">
                                            <label>Type Of Project</label>
                                            <input type="text" class="form-control" value="{{ old('type_of_project') }}" name="type_of_project">
                                        </div>

                                        <div class="form-group">
                                            <label>Built Up Area</label>
                                            <input type="text" class="form-control" value="{{ old('built_up_area') }}" name="built_up_area">
                                        </div>

                                        <div class="form-group">
                                            <label>Number Of Floors</label>
                                            <input type="text" class="form-control" value="{{ old('number_of_floors') }}" name="number_of_floors">
                                        </div>

                                        <div class="form-group">
                                            <label>Apartment/Floor</label>
                                            <input type="text" class="form-control" value="{{ old('apartment_floor') }}" name="apartment_floor">
                                        </div>

                                        <div class="form-group">
                                            <label>Size</label>
                                            <input type="text" class="form-control" value="{{ old('size') }}" name="size">
                                        </div>

                                        <div class="form-group">
                                            <label>Bedroom</label>
                                            <input type="text" class="form-control" value="{{ old('bedroom') }}" name="bedroom">
                                        </div>

                                        <div class="form-group">
                                            <label>Bathroom</label>
                                            <input type="text" class="form-control" value="{{ old('bathroom') }}" name="bathroom">
                                        </div>


                                        <div class="form-group">
                                            <label>Collection</label>
                                            <input type="text" class="form-control" value="{{ old('collection') }}" name="collection">
                                        </div>

                                        <div class="form-group">
                                            <label>Launch Date</label>
                                            <input type="text" class="form-control" value="{{ old('launch_date') }}" name="launch_date">
                                        </div>

                                        <div class="form-group">
                                            <label>Completion Date</label>
                                            <input type="text" class="form-control" value="{{ old('completion_date') }}" name="completion_date">
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">ONGOING</option>
                                                <option value="2">UPCOMING</option>
                                                <option value="3">COMPLETED</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Sorting Number</label>
                                            <input type="number" min="1" class="form-control" value="{{ old('sort_number') }}" name="sort_number">
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">
                                                        {{__('messages.ln166')}}
                                                    </span>
                                                </div>
                                                <textarea class="form-control" name="description"
                                                    placeholder="Add Your Project Details"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Iframe Code</label>
                                            <input type="text" class="form-control" value="{{ old('iframe_code') }}" name="iframe_code">
                                        </div>

                                        <div class="form-group">
                                            <label>Featured Image</label>
                                            <input type="file" class="form-control" name="featured_image">
                                        </div>

                                        <div class="form-group">
                                            <label>Brochure</label>
                                            <input type="file" class="form-control" name="brochure">
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                                            <label class="form-check-label" for="is_active">
                                              Is Active
                                            </label>
                                        </div>

                                        <button type="submit"
                                            class="btn btn-primary float-right">{{ __('messages.ln109')}}</button>
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