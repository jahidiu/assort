<ul>
    @foreach($childs as $child)
    <li>
        <label class="custom-control custom-checkbox custom-control-inline mb-0">
            <input type="checkbox" name="ids" class="custom-control-input ids" value="{{$child->id}}">
            <span class="custom-control-label">{{ $child->name }}</span>
        </label>
        <a class="text-primary pointer_mouse" data-toggle="modal"
            data-target="#exampleModal-{{$child->id}}">{{__('messages.ln143')}}</a>
        {{-- modal start --}}
        <!-- Modal -->
        <div class="modal fade" id="exampleModal-{{$child->id}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{route('post_category.update',[$child->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('messages.ln177')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" type="text" name="name" value="{{ $child->name }}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">{{__('messages.ln73')}}</button>

                            <input type="button" value="{{__('messages.ln108')}}" class="btn btn-danger"
                                data-dismiss="modal">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- modal end --}}
        &nbsp;&nbsp;
        <form class="d-inline" action="{{route('post_category.destroy',[$child->id])}}" method="post">
            @csrf
            @method('DELETE')
            <a onclick="this.parentElement.submit()" class="text-danger pointer_mouse">{{__('messages.ln74')}}</a>
        </form>
        @if(count($child->childrenCategories))
        @include('layouts.managepostChild',['childs' => $child->childrenCategories])
        @endif
    </li>
    @endforeach
</ul>