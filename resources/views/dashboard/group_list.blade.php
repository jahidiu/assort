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
                        <h2 class="pageheader-title text-primary">{{ __('messages.ln7')}} &nbsp;
                            <a href="{{route('group.create')}}" class="btn btn-primary"> {{__('messages.ln65')}}</a>
                        </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{ __('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.ln7')}}</li>
                                </ol>
                            </nav>
                            @include('layouts.wait')
                            <button id="deleteSelectedGroups"
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
                        <h4 class="card-header text-success">{{ __('messages.ln7')}}
                            <form class="float-right d-flex" action="{{route('group_search')}}" method="GET">
                                @csrf
                                <input class="form-control d-inline mr-3" type="text" name="key" id="">
                                <input class="btn btn-primary d-inline" type="submit" value="Search">
                            </form>
                        </h4>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input id="mainbox" type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-label">{{__('messages.ln40')}}</span>
                                                </label>
                                            </th>
                                            <th scope="col">
                                                <span>{{ __('messages.ln68')}}</span>
                                            </th>
                                            {{-- <th scope="col" class="mt-0">{{ __('messages.ln69')}}</th> --}}
                                            <th class="mt-0">{{ __('messages.ln44')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                         @php
                                            $i = $data->groups->perPage() * ($data->groups->currentPage() - 1);
                                             $i++;
                                        @endphp

                                        @foreach ($data->groups as $group)
                                        @unless ($group->id == 4 || $group->id == 1)

                                        <tr>
                                             <td>
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input name="ids" value="{{ $group->id }}" type="checkbox"
                                                        class="custom-control-input ids">
                                                    <span class="custom-control-label">{{ $i }}</span>
                                                </label>

                                                @php($i++)
                                            </td>
                                            <th scope="row">
                                                <span>{{$group->group_name}}</span>
                                            </th>
                                            <td>
                                                @if (check(2,3, $permissions))
                                                <a href="{{ route('group.edit', [$group->id]) }}" class="btn btn-success btn-block btn-sm mb-2"><i class="fas fa-edit">&nbsp;</i> Edit</a>
                                                @endif
                                                @if (check(2,4, $permissions))
                                                <form action=" {{ route('group.destroy', [$group->id]) }} " method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash-alt">&nbsp;</i> Delete</button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endunless
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="w-25 mx-auto">
                            {{ $data->groups->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include("layouts.footer")
