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
            <h2 class="pageheader-title"> Our client speak for us </h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">{{ __('messages.ln1') }}</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page"> Our client speak for us
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
            <h5 class="card-header">Add Our client speak for us</h5>
            <div class="card-body">
              <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend">
                        Title
                      </span>
                    </div>
                    <input class="form-control form-control-lg" name="post_title" type="text"
                      placeholder="Post Title" autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend">
                        Description
                      </span>
                    </div>
                    <textarea class="form-control" name="editor1" placeholder="Add Your Page Content"></textarea>
                    <script>
                      CKEDITOR.replace('editor1');
                    </script>
                  </div>
                </div>
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
                        {{ __('Rating') }}
                      </span>
                    </div>
                    <input class="form-control form-control-lg" name="rate" type="number" min="1"
                      max="5" step="0.01" placeholder="Client Rating" autocomplete="off">
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
                      <option value="1">Publish</option>
                      <option value="0">Unpublish</option>
                    </select>
                  </div>
                </div>
                <input type="submit" name="submit" value="{{ __('messages.ln109') }}"
                  class="btn btn-primary float-right">
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
