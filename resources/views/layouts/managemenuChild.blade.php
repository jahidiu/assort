<ul class="menu_list">
    @foreach($childs as $child)
    <li data-id="{{$child->id}}">
        <label class="custom-control custom-checkbox custom-control-inline mb-0">
            <input type="checkbox" name="ids" value="{{$child->id}}" class="custom-control-input ids">
            <span class="custom-control-label"> {{ $child->name }} </span>
        </label>
        <a class="text-primary pointer_mouse" data-toggle="modal" data-target="#exampleModal-{{$child->id}}">{{__('messages.ln143')}}</a>
        {{-- modal start --}}
        <!-- Modal -->
        <div class="modal fade" id="exampleModal-{{$child->id}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{route('menulist.update',[$child->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <input class="form-control" type="text" name="name" value="{{ $child->name }}" placeholder="Submenu Name">
                            </div>
                            <div class="">
                                <input class="form-control" type="text" name="url" value="{{ $child->url }}" placeholder="Url">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('messages.ln108')}}</button>
                            <button type="submit" class="btn btn-primary ">{{__('messages.ln73')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- modal end --}}
        &nbsp;&nbsp;
        <form class="d-inline" action="{{route('menulist.destroy',[$child->id])}}" method="post">
            @csrf
            @method('DELETE')
            <a onclick="this.parentElement.submit()" class="text-danger pointer_mouse">Delete</a>
        </form>
        @if(count($child->childrenMenus))
        @include('layouts.managemenuChild',['childs' => $child->childrenMenus])
        @endif
    </li>
    @endforeach
</ul>
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



