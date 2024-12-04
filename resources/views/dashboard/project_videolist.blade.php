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
                                Project Video List
                            </h2>

                            {{-- single image start --}}

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#exampleModal">
                                Add Video
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('project_video.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="project_id" value="{{ $data->project->id }}">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Add Video</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="col-form-label">Youtube (Ex:
                                                        https://www.youtube.com/watch?v=<span
                                                            class="text-danger">tDolNU89SXI</span>)</label>
                                                    <input name="url" type="text" class="form-control" required>
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
                                <th>Video</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->project_videos as $video)
                            <tr>
                                <td>
                                    <iframe width="300" height="200"
                                        src="https://www.youtube.com/embed/{{ $video->url }}" frameborder="0"
                                        allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"></iframe>

                                </td>
                                <td>
                                    <form action="{{ route('project_video.destroy', $video->id) }}" method="POST">
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