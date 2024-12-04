@include('layouts.header')
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
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
            <h2 class="pageheader-title"> {{ __('messages.ln161') }} </h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">{{ __('messages.ln1') }}</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page"> {{ __('messages.ln161') }}
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- end pageheader -->
      <!-- ============================================================== -->.

      <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 offset-md-2">
          @include('layouts.errors')
          <div class="card">
            <h5 class="card-header">{{ __('messages.ln161') }}</h5>
            <div class="card-body">
              <form action="{{ route('service.update', [$data->service->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend">
                        {{ __('messages.ln152') }}
                      </span>
                    </div>
                    <input class="form-control form-control-lg" name="title" type="text"
                      placeholder="Service Title" value="{{ $data->service->title }}" autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend">
                        {{ __('messages.ln153') }}
                      </span>
                    </div>
                    <textarea class="form-control" name="editor1" placeholder="Add Your Page Content">{{ $data->service->description }}</textarea>
                    <script>
                      CKEDITOR.replace('editor1');
                    </script>
                  </div>
                </div>

                <img class="slider-image mb-3" src="{{ asset('storage/post_image/' . $data->service->icon) }}"
                  alt="Not Found">
                &nbsp;

                <span>{{ __('messages.ln162') }}</span>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend">
                        {{ __('messages.ln121') }}
                      </span>
                    </div>
                    <input class="form-control form-control-lg" name="image" type="file" placeholder="Fature Image"
                      autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend">
                        {{ __('messages.ln43') }}
                      </span>
                    </div>
                    <select class="form-control" name="status">
                      <option value="1" @if ($data->service->status == 1) selected @endif>
                        Publish
                      </option>

                      <option value="0" @if ($data->service->status == 0) selected @endif>
                        Unpublish
                      </option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" value="{{ __('messages.ln73') }}"
                    class="btn btn-primary float-right mt-3">
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    @include('layouts.footer')
