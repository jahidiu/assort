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
                        <h2 class="pageheader-title">
                            Our client speak for us List &nbsp;
                            <a href="{{route('post.create')}}" class="btn btn-primary"> {{__('messages.ln65')}}</a>
                        </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Our client speak for us List</li>
                                </ol>
                            </nav>
                             @include('layouts.wait')
                            <button id="deleteSelectedPosts"
                                class="btn btn-danger float-right mb-5">{{__('messages.ln169')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            @include("layouts.errors")
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Our client speak for us
                            <form class="float-right d-flex" action="{{route('post_search')}}" method="GET">
                                @csrf
                                <input class="form-control d-inline mr-3" type="text" name="key" id="">
                                <input class="btn btn-primary d-inline" type="submit" value="Search">
                            </form>
                        </h5>
                        {{-- <h6 class="card-header"> {{__('messages.ln111')}} ({{$data->count}}) || {{__('messages.ln112')}} ({{$data->publish}}) || {{__('messages.ln113')}} ({{$data->unpublish}}) </h6> --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr style="">
                                        <th scope="col">
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input id="mainbox" type="checkbox" class="custom-control-input">
                                                <span class="custom-control-label">{{__('messages.ln40')}}</span>
                                            </label>
                                        </th>
                                        <th style="font-size: 16px;" class="text-muted">
                                        <span><b>{{__('messages.ln158')}}</b></span>
                                        </th>
                                        <th style="font-size: 16px;" class="text-muted">
                                        <span><b>Image</b></span>
                                        </th>
                                        <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln43')}}</b></th>
                                        <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln114')}}</b></th>
                                        <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln73')}}</b></th>
                                        <th style="font-size: 17px;" class="text-muted"><b>{{__('messages.ln44')}}</b></th>
                                    </tr>

                                    @php
                                        $i = $data->post->perPage() * ($data->post->currentPage() - 1);
                                        $i++;
                                    @endphp
                                    @foreach($data->post as $post)
                                    <tr>
                                         <td>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input name="ids" value="{{ $post->id }}" type="checkbox"
                                                    class="custom-control-input ids">
                                                <span class="custom-control-label">{{ $i }}</span>
                                            </label>

                                            @php($i++)
                                        </td>
                                        <td>{{$post->post_title}}</td>
                                        <td style="width:180px">
                                            <img class="slider-image img-fluid" src="{{ asset('storage/post_image/'.$post->feature_image) }}" alt="Not Found">
                                        </td>
                                        <td>
                                            @if($post->status == 1)
                                                <a href="{{route('toogle_post_permission',[$post->id])}}"><button class="btn btn-primary btn-sm">Publish</button></a>
                                            @else
                                                <a href="{{route('toogle_post_permission',[$post->id])}}"><button class="btn btn-danger btn-sm">Unpublish</button></a>
                                            @endif
                                        </td>
                                        <td>{{$post->created_at}} </td>
                                        <td>{{$post->updated_at}} </td>
                                        <td>
                                            @if (check(22,3, $permissions))
                                            <a style="text-decoration: none;"
                                                href="{{route('post.edit',[$post->id])}}"><button
                                                    class="btn btn-success btn-sm btn-block mb-2"><i
                                                    class="fas fa-edit">&nbsp;</i> {{__('messages.ln143')}}</button></a>
                                            @endif
                                            @if (check(22,4, $permissions))
                                            <form action="{{route('post.destroy',[$post->id])}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger btn-block btn-sm"><i
                                                    class="fas fa-trash-alt">&nbsp;</i> {{__('messages.ln74')}}</button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="w-25 mx-auto">
                        {{ $data->post->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("layouts.footer")