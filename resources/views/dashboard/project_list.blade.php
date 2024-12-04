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
                                {{ $data->page_header }}
                            </h2>

                            <div class="mt-4">
                                <a href="{{ route('project.create') }}" class="btn btn-primary float-right">Add
                                    Project</a>
                            </div>

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
                    <table class="table table-bordered dtb">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Title</th>
                                <th>Featured Image</th>
                                <td>Address</td>
                                <td>Created At</td>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->projects as $project)
                            <tr>
                                <td>{{ $project->sort_number }}</td>
                                <td>{{ $project->title }}</td>
                                <td>
                                    <img class="slider-image" width="100px" height="100px"
                                        src="{{ asset('storage/project/images/' .$project->featured_image) }}" alt="">
                                </td>
                                <td>{{ $project->address }}</td>
                                <td>{{ $project->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('project.show', $project) }}">View</a>
                                            <a class="dropdown-item"
                                                href="{{ route('project.edit', $project) }}">Edit</a>

                                            <form action="{{ route('project.destroy', $project) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Delete</button>
                                            </form>

                                        </div>
                                    </div>
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