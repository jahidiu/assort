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
                                        <h5 class="modal-title" id="exampleModalLabel">{{__('messages.ln132')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <form action="{{route('imagedropzone')}}" class="dropzone" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="gallery_id" value="{{ $data->gallery->id }}">
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
                                <form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                {{__('messages.ln132')}}&nbsp;({{__('messages.ln165')}})</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="col-form-label">{{__('messages.ln158')}}</label>
                                                <input name="title" type="text" class="form-control">
                                                <input name="gallery_id" type="hidden" value="{{ $data->gallery->id }}"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label class="col-form-label">{{__('messages.ln166')}}</label>
                                                <input name="description" type="text" class="form-control">
                                            </div>

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


                        <h2 class="pageheader-title text-primary mb-3">{{__('messages.ln136')}}
                            ({{ $data->gallery->name }})</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{__('messages.ln1')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('galleries.index')}}"
                                            class="breadcrumb-link">{{__('messages.ln131')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#"
                                            class="breadcrumb-link">{{__('messages.ln136')}}
                                            ({{ $data->gallery->name }})</a>
                                    </li>
                                </ol>
                            </nav>
                            @include('layouts.wait')
                            <button id="deleteSelectedGalleryImages" class="btn btn-danger float-right mb-5">Delete
                                Selected</button>
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
                        <h4 class="card-header text-success">{{__('messages.ln136')}} ({{ $data->gallery->name }})
                            <form class="float-right d-flex" action="{{route('image_search')}}" method="GET">
                                @csrf
                                <input class="form-control d-inline mr-3" type="text" name="key" id="">
                                <input type="hidden" name="id" value="{{$data->gallery->id}}">
                                <input class="btn btn-primary d-inline" type="submit" value="Search">
                            </form>
                        </h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input id="mainbox" type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-label">{{__('messages.ln40')}}</span>
                                                </label>
                                            </th>
                                            <th scope="col">{{__('messages.ln158')}}</th>
                                            <th scope="col">{{__('messages.ln160')}}</th>
                                            <th scope="col">{{__('messages.ln44')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="image_list">

                                        {{-- {{ dd($data->images) }} --}}

                                        @php
                                        $i = $data->images->perPage() * ($data->images->currentPage() - 1);
                                        // $i=0;
                                        $i++;
                                        @endphp

                                        @foreach ($data->images->sortBy('position') as $image)
                                        <tr data-id="{{ $image->id }}">
                                            <th scope="row">
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="ids" value="{{ $image->id }}" type="checkbox"
                                                        class="custom-control-input ids">
                                                    <span class="custom-control-label"><span>{{ $i }}</span>
                                                </label>

                                                @php($i++)
                                            </th>
                                            <td>{{$image->title}}</td>
                                            <td>
                                                <img class="slider-image"
                                                    src="{{ asset('storage/imagegallery/image/' .$image->image) }}"
                                                    alt="">
                                            </td>

                                            <td>
                                                @if (check(3,3, $permissions))

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-success btn-block btn-sm mb-2"
                                                    data-toggle="modal" data-target="#exampleModal-{{ $image->id }}"><i
                                                        class="fas fa-edit"></i>&nbsp;
                                                    {{__('messages.ln143')}}
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{ $image->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form action="{{route('images.update', [$image->id])}}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method("PUT")
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        {{__('messages.ln167')}} </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-form-label">{{__('messages.ln158')}}</label>
                                                                        <input value="{{ $image->title }}" name="title"
                                                                            type="text" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-form-label">{{__('messages.ln166')}}</label>
                                                                        <input name="description" type="text"
                                                                            value="{{ $image->description }}"
                                                                            class="form-control">
                                                                    </div>

                                                                    <img class="slider-image"
                                                                        src="{{ asset('storage/imagegallery/image/' .$image->image ) }}"
                                                                        alt="not found">

                                                                    <div class="form-group">
                                                                        <label
                                                                            class="col-form-label">{{__('messages.ln160')}}</label>
                                                                        <input name="image" type="file"
                                                                            class="form-control">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">{{__('messages.ln73')}}</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">{{__('messages.ln108')}}</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                @endif

                                                @if (check(3,4, $permissions))
                                                <form action="{{ route('images.destroy', [$image->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger btn-block btn-sm"><i
                                                            class="fas fa-trash-alt"></i>&nbsp; Delete</button>
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
                        {{ $data->images->links() }}
                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("layouts.footer")



        <script>
            // images gallery images position update
    function updateToDatabase(idString){
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

        $.ajax({
        url:'{{url('/imagelist/update')}}',
        method:'POST',
        data:{ids:idString},
        success:function(){
        }
        })
    }

    var target = $('.image_list');

    target.sortable({

        update: function (e, ui){
            var sortData = target.sortable('toArray',{ attribute: 'data-id'})
            updateToDatabase(sortData.join(','))
        }
    })

        </script>