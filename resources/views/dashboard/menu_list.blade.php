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
                            <h2 class="pageheader-title">{{__('messages.ln174')}} ({{$data->menu_id->name}}) &nbsp;
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">{{__('messages.ln171')}}</button>
                                <form action="{{route('menulist.store')}}" method="POST">
                                    @csrf
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{__('messages.ln171')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                     <div class="modal-body">
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">
                                                        {{__('messages.ln173')}}
                                                    </span>
                                                </div>
                                                <select class="form-control" name="parent_id">
                                                    <option value=""> Choose Parent Menu </option>
                                                    @foreach($data->menus as $menu)
                                                        <option value="{{$menu->id}}">
                                                            {{$menu->name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                <div>
                                                   <input class="form-control" type="text" name="name"
                                                    placeholder="{{__('messages.ln174')}}"> 
                                                </div>
                                                <div class="mt-2">
                                                   <input class="form-control" type="text" name="url"placeholder="{{__('messages.ln176')}}"> 
                                                </div>
                                                <div>
                                                   <input class="form-control" type="hidden" name="menu_id" value="{{$data->menu_id->id}}"> 
                                                </div>
                                            </div>
                                        </div>
                                      <div class="modal-footer">
                                        <input type="button" value="{{__('messages.ln108')}}" class="btn btn-secondary" data-dismiss="modal">
                                        <input type="submit" name="submit" class="btn btn-primary" value="{{__('messages.ln109')}}">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </form>
                            </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/kt-admin" class="breadcrumb-link">{{__('messages.ln1')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{__('messages.ln174')}} ({{$data->menu_id->name}})</li>
                                    </ol>
                                </nav>
                                @include('layouts.wait')
                                <button id="deleteSelectedMenulist" class="btn btn-danger float-right mb-5">{{__('messages.ln169')}}</button>
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
                                {{__('messages.ln172')}} ({{$data->count}})&nbsp;
                                <form class="float-right d-flex" action="{{route('menulist_search')}}" method="GET">
                                @csrf
                                <input class="form-control d-inline mr-3" type="text" name="key" >
                                <input class="form-control d-inline" type="hidden" name="menu_id" value="{{$data->menu_id->id}}">
                                <input class="btn btn-primary d-inline" type="submit" value="Search"> 
                            </form>
                            </h5>
                        <div class="card-body">
                            <div class="table-responsive" id="jstree_demo_div">
                                <ul class="list-unstyled menu_list">
                                    @foreach($data->menu->sortBy('position') as $menu)
                                    {{-- modal start --}}
                                    <!-- Modal -->
                                <li data-id="{{$menu->id}}">
                                    <div class="modal fade" id="exampleModal-{{$menu->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{route('menulist.update',[$menu->id])}}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Menu
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-2">
                                                            <input class="form-control" type="text" name="name" value="{{$menu->name}}" placeholder="Menu Name">
                                                        </div>
                                                        <div class="">
                                                            <input class="form-control" type="text" name="url" value="{{$menu->url}}" placeholder="Menu Url">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{__('messages.ln108')}}</button>
                                                        <button type="submit" class="btn btn-primary pointer_mouse">{{__('messages.ln73')}}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- modal end --}}
                                        <label class="custom-control custom-checkbox custom-control-inline mb-0">
                                            <input type="checkbox" name ="ids" value="{{$menu->id}}" class="custom-control-input ids">
                                            <span class="custom-control-label"> {{ $menu->name }} </span>
                                        </label>
                                        @unless ($menu->id == 100000)  
                                        <a class="text-primary pointer_mouse" data-toggle="modal"
                                            data-target="#exampleModal-{{$menu->id}}">{{__('messages.ln143')}}</a> &nbsp;&nbsp;
                                        <form class="d-inline"
                                            action="{{route('menulist.destroy',[$menu->id])}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a onclick="this.parentElement.submit()"
                                                class="text-danger pointer_mouse">{{__('messages.ln74')}}</a>
                                        </form>
                                        @endunless
                                        @if(count($menu->childrenMenus))
                                        @include('layouts.managemenuChild', ['childs' => $menu->childrenMenus])
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

        <script>
    $(document).ready(function(){
        
        function updateToDatabase(idString){
           $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
            
           $.ajax({
              url:'{{url('/menu/update-order')}}',
              method:'POST',
              data:{ids:idString},
              success:function(){
              }
           })
        }
        var target = $('.menu_list');
        target.sortable({
            update: function (e, ui){
               var sortData = target.sortable('toArray',{ attribute: 'data-id'})
               updateToDatabase(sortData.join(','))
            }
        })   
    })
</script>