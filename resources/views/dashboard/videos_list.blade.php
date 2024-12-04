@php
  $permissions = Session::get('permissions');
@endphp
@include('layouts.header')
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
  <!-- ============================================================== -->
  <!-- navbar -->
  <!-- ============================================================== -->
  @include('layouts.navbar')
  <!-- ============================================================== -->
  <!-- end navbar -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- left sidebar -->
  <!-- ============================================================== -->
  @include('layouts.leftsidebar')
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
            {{-- multiple Video start --}}
            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary float-right ml-3" data-toggle="modal"
              data-target="#exampleModall">
              {{ __('messages.ln139') }}
            </button> --}}
            <!-- Modal -->
            {{-- <div class="modal fade" id="exampleModall" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabell" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      {{ __('messages.ln138') }}&nbsp;({{ __('messages.ln179') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('videodropzone') }}" class="dropzone" method="POST"
                      enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="vgallery_id" value="{{ $data->vgallery->id }}">
                      <div class="fallback">
                        <input name="file" type="file" multiple />
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger"
                      data-dismiss="modal">{{ __('messages.ln108') }}</button>
                  </div>
                </div>
              </div>
            </div> --}}
            {{-- multiple Video end --}}


            {{-- single Video start --}}
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
              {{ __('messages.ln138') }}
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        {{ __('messages.ln138') }}&nbsp;({{ __('messages.ln179') }})</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-form-label">{{ __('messages.ln140') }}</label>
                        <input name="title" type="text" class="form-control">
                        <input name="vgallery_id" type="hidden" value="{{ $data->vgallery->id }}"
                          class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">{{ __('messages.ln166') }}</label>
                        <input name="description" type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">{{ __('messages.ln141') }}</label>
                        <input name="image" type="file" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Youtube (Ex: https://www.youtube.com/watch?v=<span class="text-danger">tDolNU89SXI</span>)</label>
                        <input name="video_url" type="text" class="form-control">
                    </div>
                      {{-- <div class="form-group">
                        <label class="col-form-label">{{ __('messages.ln142') }}</label>
                        <input name="video" type="file" class="form-control" required>
                      </div> --}}
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">{{ __('messages.ln109') }}</button>
                      <button type="button" class="btn btn-danger"
                        data-dismiss="modal">{{ __('messages.ln108') }}</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            {{-- single Video end --}}


            <h2 class="pageheader-title text-primary mb-3">{{ __('messages.ln27') }}
              ({{ $data->vgallery->name }})</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/kt-admin"
                      class="breadcrumb-link">{{ __('messages.ln1') }}</a>
                  </li>
                  <li class="breadcrumb-item"><a href="{{ route('vgalleries.index') }}"
                      class="breadcrumb-link">{{ __('messages.ln137') }}</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{ __('messages.ln27') }}
                      ({{ $data->vgallery->name }})</a>
                  </li>
                </ol>
              </nav>
              @include('layouts.wait')
              <button id="deleteSelectedGalleryVideo" class="btn btn-danger float-right mb-5">Delete
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
            <h4 class="card-header text-success">{{ __('messages.ln27') }} ({{ $data->vgallery->name }})
              <form class="float-right d-flex" action="{{ route('video_search') }}" method="GET">
                @csrf
                <input class="form-control d-inline mr-3" type="text" name="key" id="">
                <input type="hidden" name="id" value="{{ $data->vgallery->id }}">
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
                          <span class="custom-control-label">{{ __('messages.ln40') }}</span>
                        </label>
                      </th>
                      <th scope="col">{{ __('messages.ln140') }}</th>
                      <th scope="col">{{ __('messages.ln141') }}</th>
                      <th scope="col">{{ __('messages.ln44') }}</th>
                    </tr>
                  </thead>
                  <tbody class="video_list">
                    {{-- {{ dd($data->videos) }} --}}
                    @php
                      $i = $data->videos->perPage() * ($data->videos->currentPage() - 1);
                      $i = 0;
                      $i++;
                    @endphp
                    @foreach ($data->videos->sortBy('position') as $video)
                      <tr data-id="{{ $video->id }}">
                        <th scope="row">
                          <label class="custom-control custom-checkbox custom-control-inline">
                            <input name="ids" value="{{ $video->id }}" type="checkbox"
                              class="custom-control-input ids">
                            <span class="custom-control-label"><span>{{ $i }}</span>
                          </label>
                          @php($i++)
                        </th>
                        <td>{{ $video->title }}</td>
                        <td>
                          <img class="slider-image"
                            src="{{ asset('storage/videogallery/image/' . $video->thumbnail) }}" alt="">
                        </td>
                        <td>
                          @if (check(13, 3, $permissions))
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-block btn-sm mb-2" data-toggle="modal"
                              data-target="#exampleModal-{{ $video->id }}"><i class="fas fa-edit"></i>&nbsp;
                              {{ __('messages.ln143') }}
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal-{{ $video->id }}" tabindex="-1"
                              role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form action="{{ route('videos.update', [$video->id]) }}" method="POST"
                                  enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">
                                        {{ __('messages.ln168') }} </h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">

                                      <div class="form-group">
                                        <label class="col-form-label">{{ __('messages.ln158') }}</label>
                                        <input value="{{ $video->title }}" name="title" type="text"
                                          class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label class="col-form-label">{{ __('messages.ln166') }}</label>
                                        <input name="description" type="text" value="{{ $video->description }}"
                                          class="form-control">
                                      </div>

                                      @if (isset($video->thumbnail) && !empty($video->thumbnail))
                                        <img class="slider-image"
                                          src="{{ asset('storage/videogallery/image/' . $video->thumbnail) }}"
                                          alt="not found">
                                      @endif
                                      <div class="form-group">
                                        <label class="col-form-label">{{ __('messages.ln141') }}</label>
                                        <input name="thumbnail" type="file" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label class="col-form-label">Youtube (Ex: https://www.youtube.com/watch?v=<span class="text-danger">tDolNU89SXI</span>)</label>
                                        <input name="video_url" type="text" class="form-control" value="{{ $video->video_url }}">
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit"
                                        class="btn btn-primary">{{ __('messages.ln73') }}</button>

                                      <button type="button" class="btn btn-danger"
                                        data-dismiss="modal">{{ __('messages.ln108') }}</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          @endif
                          @if (check(13, 4, $permissions))
                            <form action="{{ route('videos.destroy', [$video->id]) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash-alt"></i>&nbsp;
                                Delete</button>
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
            {{-- {{ $data->videos->links() }} --}}
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    @include('layouts.footer')



    <script>
      // images gallery videos position update
      function updateToDatabase(idString) {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url: '{{ url('/videolist/update') }}',
          method: 'POST',
          data: {
            ids: idString
          },
          success: function() {}
        })
      }

      var target = $('.video_list');
      target.sortable({
        update: function(e, ui) {
          var sortData = target.sortable('toArray', {
            attribute: 'data-id'
          })
          updateToDatabase(sortData.join(','))
        }
      })
    </script>
