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
                                {{ $data->project->title }} Edit
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
                            <h5 class="card-header">{{ $data->project->title }} Edit</h5>
                            <div class="card-body">
                                <div class="">

                                    <form action=" {{ route('project.update', $data->project) }} " method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ $data->project->title }}">
                                        </div>


                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" value="{{ $data->project->address }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Type Of Project</label>
                                            <input type="text" class="form-control" name="type_of_project" value="{{ $data->project->type_of_project }}">
                                        </div>


                                        <div class="form-group">
                                            <label>Built Up Area</label>
                                            <input type="text" class="form-control" name="built_up_area" value="{{ $data->project->built_up_area }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Number Of Floors</label>
                                            <input type="text" class="form-control" name="number_of_floors" value="{{ $data->project->number_of_floors }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Apartment/Floor</label>
                                            <input type="text" class="form-control" name="apartment_floor" value="{{ $data->project->apartment_floor }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Size</label>
                                            <input type="text" class="form-control" name="size" value="{{ $data->project->size }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Bedroom</label>
                                            <input type="text" class="form-control" name="bedroom" value="{{ $data->project->bedroom }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Bathroom</label>
                                            <input type="text" class="form-control" name="bathroom" value="{{ $data->project->bathroom }}">
                                        </div>


                                        <div class="form-group">
                                            <label>Collection</label>
                                            <input type="text" class="form-control" name="collection" value="{{ $data->project->collection }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Launch Date</label>
                                            <input type="text" class="form-control" name="launch_date" value="{{ $data->project->launch_date }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Completion Date</label>
                                            <input type="text" class="form-control" name="completion_date" value="{{ $data->project->completion_date }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $data->project->status == "1" ? "selected" : '' }}>ONGOING</option>
                                                <option value="2" {{ $data->project->status == "2" ? "selected" : '' }}>UPCOMING</option>
                                                <option value="3" {{ $data->project->status == "3" ? "selected" : '' }}>COMPLETED</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Sorting Number</label>
                                            <input type="number" min="1" class="form-control" value="{{ $data->project->sort_number }}" name="sort_number">
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">
                                                        {{__('messages.ln166')}}
                                                    </span>
                                                </div>
                                                <textarea class="form-control" name="description"
                                                    placeholder="Add Your Project Details">{!! $data->project->description !!}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Iframe Code</label>
                                            <input type="text" class="form-control" name="iframe_code"
                                                value="{{ $data->project->iframe_code }}">
                                        </div>

                                        <img src="{{ asset('storage/project/images/' .$data->project->featured_image) }}" style="width: 100px;" alt="Project Image">

                                        <div class="form-group">
                                            <label>Featured Image</label>
                                            <input type="file" class="form-control" name="featured_image">
                                        </div>

                                        <div class="form-group">
                                            <label>Brochure</label>
                                            <input type="file" class="form-control" name="brochure">
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" @if ($data->project->is_active)
                                                checked
                                            @endif>
                                            <label class="form-check-label" for="is_active">
                                              Is Active
                                            </label>
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