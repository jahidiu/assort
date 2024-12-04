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
                    <h2 class="pageheader-title text-primary mb-3">{{__('messages.ln172')}}&nbsp;
                        @if (check(12,2, $permissions))
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal">
                            {{__('messages.ln171')}}
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{route('menu.store')}}" method="POST">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">{{__('messages.ln171')}}</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-form-label">{{__('messages.ln159')}}</label>
                                                <input name="name"  type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">{{__('messages.ln108')}}</button>
                                            <button type="submit" class="btn btn-primary">{{__('messages.ln109')}}</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                        @endif
                    </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">{{__('messages.ln1')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{__('messages.ln172')}}</a>
                                </li>
                            </ol>
                        </nav>
                         @include('layouts.wait')
                        <button id="deleteSelectedMenus"
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
                    <h4 class="card-header text-success">{{__('messages.ln172')}}
                        <form class="float-right d-flex" action="{{route('menu_search')}}" method="GET">
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
                                        <th scope="col">{{__('messages.ln114')}}</th>
                                        <th scope="col">{{__('messages.ln44')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = $data->allmenus->perPage() * ($data->allmenus->currentPage() - 1);
                                    $i++;
                                    @endphp
                                    @foreach ($data->allmenus as $menu)
                                    <tr>
                                       <td>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input name="ids" value="{{ $menu->id }}" type="checkbox" class="custom-control-input ids">
                                                <span class="custom-control-label">{{ $i }}</span>
                                            </label>
                                            @php($i++)
                                        </td>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->created_at }}</td>
                                        <td>
                                            @if (check(24,3, $permissions))
                                            <a href="{{route('menu.show',[$menu->id])}}" class="btn btn-success btn-block btn-sm mb-2">View</a>
                                            @endif
                                            @if (check(24,4, $permissions))
                                            <form action="{{route('menu.destroy',[$menu->id])}}"
                                                method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash-alt"></i>&nbsp; Delete</button>
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
                   {{ $data->allmenus->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    @include("layouts.footer")
