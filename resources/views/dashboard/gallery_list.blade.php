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
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title text-primary mb-3">{{__('messages.ln131')}}&nbsp;

                            @if (check(12,2, $permissions))
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                {{__('messages.ln132')}}
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('galleries.store')}}" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">{{__('messages.ln132')}}
                                                </h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="col-form-label">{{__('messages.ln133')}}</label>
                                                    <input name="name" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Type</label>
                                                    <select class="form-control" name="type">
                                                        <option value="general">General</option>
                                                        <option value="interior">Interior</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit"
                                                    class="btn btn-primary">{{__('messages.ln109')}}</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">{{__('messages.ln108')}}</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#"
                                            class="breadcrumb-link">{{__('messages.ln131')}}</a>
                                    </li>
                                </ol>
                            </nav>
                            @include('layouts.wait')
                            <button id="deleteSelectedImageGallery"
                                class="btn btn-danger float-right mb-5">{{__('messages.ln169')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @include('layouts.errors')
                    <div class="card">
                        <h4 class="card-header text-success">{{__('messages.ln131')}}
                            <form class="float-right d-flex" action="{{route('image_gallery')}}" method="GET">
                                @csrf
                                <input class="form-control d-inline mr-3" type="text" name="key" id="">
                                <input class="btn btn-primary d-inline" type="submit" value="Search">
                            </form>
                        </h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input id="mainbox" type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-label">{{__('messages.ln40')}}</span>
                                                </label>
                                            </th>
                                            <th scope="col">{{__('messages.ln159')}}</th>
                                            <th scope="col">{{__('Type')}}</th>
                                            <th scope="col">{{__('messages.ln114')}}</th>
                                            <th scope="col">{{__('messages.ln44')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = $data->gallerys->perPage() * ($data->gallerys->currentPage() - 1);
                                        $i++;
                                        @endphp
                                        @foreach ($data->gallerys as $gallery)
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="ids" value="{{ $gallery->id }}" type="checkbox"
                                                        class="custom-control-input ids">
                                                    <span class="custom-control-label">{{ $i }}</span>
                                                </label>

                                                @php($i++)
                                            </td>
                                            <td>{{ $gallery->name }}</td>
                                            <td>{{ $gallery->type }}</td>
                                            <td>{{ $gallery->created_at }}</td>
                                             <td>
                                                @if (check(10,1, $permissions))
                                                    <a href="{{ route('galleries.show', [$gallery->id]) }}"
                                                       class="btn btn-primary btn-block btn-sm mb-2">View</a>
                                                @endif

                                                @if (check(10,3, $permissions))
                                                    <button type="button" class="btn btn-success btn-block mb-2"
                                                            data-toggle="modal" data-target="#edit-{{$gallery->id}}">
                                                        Edit
                                                    </button>

                                                    <!-- edit modal start -->
                                                    <div class="modal fade" id="edit-{{$gallery->id}}" tabindex="-1"
                                                         role="dialog" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form action="{{route('galleries.update', $gallery->id)}}"
                                                                      method="POST">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Edit
                                                                            -
                                                                            {{$gallery->name}} </h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Gallery Name</label>
                                                                            <input type="text" name="name"
                                                                                   class="form-control"
                                                                                   value="{{$gallery->name}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Type</label>
                                                                            <select class="form-control" name="type">
                                                                                <option value="general" {{ $gallery->type != 'interior' ? 'selected' : ''}}>General</option>
                                                                                <option value="interior" {{ $gallery->type == 'interior' ? 'selected' : ''}}>Interior</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            Save changes
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- edit modal end -->
                                                @endif

                                                @if (check(10,4, $permissions))
                                                    <form action="{{ route('galleries.destroy', [$gallery->id]) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-danger btn-block btn-sm">Delete</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-25 mx-auto">
                        {{ $data->gallerys->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("layouts.footer")