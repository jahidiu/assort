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
                                Handover Project List
                            </h2>

                            <div class="mt-4">
                                <a href="{{ route('handover-project.create') }}" class="btn btn-primary float-right">Add
                                    Handover Project</a>
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
                                <th>SL No.</th>
                                <th>Project Name</th>
                                <th>Project Address</th>
                                {{-- <td>Created At</td> --}}
                                <th>No Of Flat</th>
                                <th>No Of Storied</th>
                                <th>No Of Handover Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                            @endphp
                            @foreach ($data->hprojects as $project)
                            @php
                            $i++;
                            @endphp
                            <tr>
                                <td>{{ $project->sort_number }}</td>
                                <td>{!! $project->name !!}</td>
                                <td>{{ $project->address }}</td>
                                {{-- <td>{{ $project->created_at }}</td> --}}
                                <td>{{ $project->no_of_flat }}</td>
                                <td>{{ $project->no_of_storied }}</td>
                                <td>{{ $project->handover_date }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="{{ route('handover-project.edit', $project->id) }}">Edit</a>

                                            <form action="{{ route('handover-project.destroy', $project->id) }}"
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