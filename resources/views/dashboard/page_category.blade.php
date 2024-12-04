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
                        <h2 class="pageheader-title">{{__('messages.ln122')}} &nbsp;
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">{{__('messages.ln124')}}</button>
                            <form action="{{route('category.store')}}" method="POST">
                                @csrf
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    {{__('messages.ln124')}}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend">
                                                                {{__('messages.ln157')}}
                                                            </span>
                                                        </div>
                                                        <select class="form-control" name="category_id">
                                                            <option value=""> Choose Parent Category </option>
                                                            @foreach($data->allcategories as $category)
                                                            <option value="{{$category->id}}">
                                                                {{$category->name}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <input class="form-control" type="text" name="name"
                                                        placeholder="{{__('messages.ln118')}}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="submit" class="btn btn-primary"
                                                    value="{{__('messages.ln109')}}">
                                                <input type="button" value="{{__('messages.ln108')}}"
                                                    class="btn btn-danger" data-dismiss="modal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln122')}}</li>
                                </ol>
                            </nav>
                            @include('layouts.wait')
                            <button id="deleteSelectedPageCategories"
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
                        <h5 class="card-header">
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input id="mainbox" type="checkbox" class="custom-control-input">
                                <span class="custom-control-label"></span>
                            </label>
                            {{__('messages.ln123')}}&nbsp;({{$data->count}})
                            <form class="float-right d-flex" action="{{route('pagecategory_search')}}" method="GET">
                                @csrf
                                <input class="form-control d-inline mr-3" type="text" name="key" id="">
                                <input class="btn btn-primary d-inline" type="submit" value="Search">
                            </form>
                        </h5>
                        <div class="card-body">
                            <div class="table-responsive" id="jstree_demo_div">
                                <ul class="list-unstyled">
                                    @foreach($data->categories as $category)

                                    {{-- modal start --}}

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{$category->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{route('category.update',[$category->id])}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input class="form-control" type="text" name="name"
                                                            value="{{ $category->name }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">{{__('messages.ln108')}}</button>
                                                        <button type="submit"
                                                            class="btn btn-primary pointer_mouse">{{__('messages.ln73')}}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- modal end --}}

                                    <li>
                                        <label class="custom-control custom-checkbox custom-control-inline mb-0">
                                            <input type="checkbox" name="ids" class="custom-control-input ids"
                                                value="{{$category->id}}">
                                            <span class="custom-control-label">{{ $category->name }}</span>
                                        </label>
                                        @unless ($category->id == 100000)
                                        <a class="text-primary pointer_mouse" data-toggle="modal"
                                            data-target="#exampleModal-{{$category->id}}">Edit</a> &nbsp;&nbsp;
                                        <form class="d-inline" action="{{route('category.destroy',[$category->id])}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a onclick="this.parentElement.submit()"
                                                class="text-danger pointer_mouse">Delete</a>
                                        </form>
                                        @endunless
                                        @if(count($category->childrenCategories))
                                        @include('layouts.manageChild', ['childs' => $category->childrenCategories])
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("layouts.footer")