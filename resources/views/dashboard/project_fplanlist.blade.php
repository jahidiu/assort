@php
$permissions = Session::get('permissions');
@endphp

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
                                Project Floor Plan List
                            </h2>

                            {{-- multiple image start --}}

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary float-right ml-3" data-toggle="modal"
                                data-target="#exampleModall">
                                {{__('messages.ln134')}}
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModall" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabell" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Images</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            <form action="{{route('project.fplandropzone')}}" class="dropzone" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="project_id" value="{{ $data->project->id }}">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple />
                                                </div>
                                            </form>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">{{__('messages.ln108')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- multiple image end --}}


                            {{-- single image start --}}

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#exampleModal">
                                {{__('messages.ln135')}}
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('project_fplan.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="project_id" value="{{ $data->project->id }}">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Add Image</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-form-label">{{__('messages.ln160')}}</label>
                                                    <input name="image" type="file" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit"
                                                    class="btn btn-primary">{{__('messages.ln109')}}</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">{{__('messages.ln108')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- single image end --}}

                        </div>
                    </div>
                </div>
                @include('layouts.errors')

                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->



                <!-- ============================================================== -->
                <!-- Home Content Start   -->
                <!-- ============================================================== -->


                <div class="mt-5">
                    <table class="table table-bordered dtbno">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->project_floors_plans as $image)
                            <tr>
                                <td>
                                    <img class="slider-image"
                                        src="{{ asset('storage/project/images/' .$image->image) }}" alt="">
                                </td>
                                <td>
                                    <form action="{{ route('project_fplan.destroy', $image->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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