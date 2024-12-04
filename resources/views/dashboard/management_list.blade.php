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
                                Management List
                            </h2>

                            <div class="mt-4">
                                <a href="{{ route('management.create') }}" class="btn btn-primary float-right">Add
                                    Management List</a>
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
                    <table class="table table-bordered dtbno">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data->managements as $management)
                            <tr>
                                <td>{{ $management->name }}</td>
                                <td>{{ $management->designation }}</td>
                                <td>
                                    <img src="{{asset('storage/management/image/'. $management->image)}}"
                                         style="height: 150px; width:200px;" alt="">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                               href="{{ route('management.edit', $management->id) }}">Edit</a>

                                            <form action="{{ route('management.destroy', $management->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('delete')

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