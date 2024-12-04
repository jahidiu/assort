@php
    $permissions = Session::get('permissions');
@endphp

<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_dashboard')}}" aria-expanded="false" aria-controls="submenu-1-1"><i
                                    class="fas fa-home"></i>{{ __('messages.ln1')}}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-1" aria-controls="submenu-1"><i
                                    class="fa fa-fw fa-user-circle"></i>{{ __('messages.ln2')}}<span
                                    class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                       data-target="#submenu-1-1"
                                       aria-controls="submenu-1-1">{{ __('messages.ln3')}}</a>
                                    <div id="submenu-1-1" class="collapse submenu {{ request()->is('kt-admin/user*') ? 'show' : '' }}" style="">
                                        <ul class="nav flex-column">
                                            @if (check(1,1, $permissions))
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href="{{ route('user.index') }} ">{{ __('messages.ln4')}}</a>
                                                </li>
                                            @endif

                                            @if (check(1,2, $permissions))
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href=" {{ route('user.create') }} ">{{ __('messages.ln5')}}</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                       data-target="#submenu-1-2"
                                       aria-controls="submenu-1-2">{{ __('messages.ln6')}}</a>
                                    <div id="submenu-1-2" class="collapse submenu {{ request()->is('kt-admin/group*') ? 'show' : '' }}" style="">
                                        <ul class="nav flex-column">
                                            @if (check(2,1, $permissions))
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href="{{ route('group.index') }}">{{ __('messages.ln7')}}</a>
                                                </li>
                                            @endif
                                            @if (check(2,2, $permissions))
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href="{{ route('group.create') }}">{{ __('messages.ln8')}}</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                       data-target="#submenu-1-3"
                                       aria-controls="submenu-1-3">{{ __('messages.ln9')}}</a>
                                    <div id="submenu-1-3" class="collapse submenu {{ request()->is('kt-admin/userlog*') ? 'show' : '' }}" style="">
                                        <ul class="nav flex-column">
                                            @if (check(3,1, $permissions))
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href=" {{ route('module.index') }} ">{{ __('messages.ln10')}}</a>
                                                </li>
                                            @endif
                                            @if (check(3,2, $permissions))
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href=" {{ route('module.create') }} ">{{ __('messages.ln11')}}
                                                        s</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                                @if (check(4,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href=" {{ route('userlog') }} ">{{ __('messages.ln12')}}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-2" aria-controls="submenu-2"><i
                                    class="fas fa-cogs"></i>{{ __('messages.ln13')}}</a>
                        <div id="submenu-2" class="collapse submenu {{ request()->is('kt-admin/settings/*') ? 'show' : '' }}" style="">
                            <ul class="nav flex-column">
                                @if (check(5,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('general_view') }}">{{ __('messages.ln14')}}</a>
                                    </li>
                                @endif
                                @if (check(6,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user_view') }}">{{ __('messages.ln15')}}</a>
                                    </li>
                                @endif
                                @if (check(14,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('contactsetting.index') }}">{{ __('messages.ln17')}}</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                    {{-- @if (check(24,1, $permissions))
                    	<li class="nav-item">
                        	<a class="nav-link" href="{{ route('menu.index') }}">
                    <i class="fas fa-bars"></i>{{ __('messages.ln170')}}
                    </a>
                    </li>
                    @endif
                    @if (check(24,1, $permissions))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu.index') }}">
                            <i class="fas fa-cog"></i>{{ __('messages.ln178')}}
                        </a>
                    </li>
                    @endif --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-3" aria-controls="submenu-3"><i
                                    class="fas fa-file"></i>{{ __('messages.ln19')}}</a>
                        <div id="submenu-3" class="collapse submenu {{ request()->is('kt-admin/page*') ? 'show' : '' }}" style="">
                            <ul class="nav flex-column">
                                @if (check(8,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('page.index') }}">{{ __('messages.ln20')}}</a>
                                    </li>
                                @endif
                                @if (check(8,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('page.create') }}">{{ __('messages.ln21')}}</a>
                                    </li>
                                @endif
                                @if (check(15,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('category.create') }}">{{ __('messages.ln122')}}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-4" aria-controls="submenu-4">
                            <i class="fas fa-sliders-h"></i>
                            {{ __('messages.ln23')}}
                        </a>
                        <div id="submenu-4" class="collapse submenu {{ request()->is('kt-admin/slider/*') ? 'show' : '' }}" style="">
                            <ul class="nav flex-column">
                                @if (check(9,2, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('slider.create') }}">{{ __('messages.ln24')}}</a>
                                    </li>
                                @endif
                                @if (check(9,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('slider.index') }}">{{ __('messages.ln25')}}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>

                    @if (check(12,1, $permissions))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('galleries.index') }}">
                                <i class="fas fa-images"></i>
                                {{ __('messages.ln26')}}
                            </a>
                        </li>
                    @endif

                    @if (check(13,1, $permissions))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vgalleries.index') }}">
                                <i class="fas fa-video"></i>
                                {{ __('messages.ln27')}}
                            </a>
                        </li>
                    @endif


                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-5" aria-controls="submenu-5">
                            <i class="fas fa-feather-alt"></i>
                            Our client speak for us
                        </a>
                        <div id="submenu-5" class="collapse submenu {{ request()->is('kt-admin/post/*') ? 'show' : '' }}" style="">
                            <ul class="nav flex-column">
                                @if (check(22,2, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('post.create') }}">Add</a>
                                    </li>
                                @endif
                                @if (check(22,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('post.index') }}">List</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#service" aria-controls="service">
                            <i class="fas fa-feather-alt"></i>
                            Our Services
                        </a>
                        <div id="service" class="collapse submenu {{ request()->is('kt-admin/service/*') ? 'show' : '' }}" style="">
                            <ul class="nav flex-column">
                                @if (check(22,2, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('service.create') }}">Add</a>
                                    </li>
                                @endif
                                @if (check(22,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('service.index') }}">List</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-project"
                           aria-controls="submenu-project">
                            <i class="fas fa-feather-alt"></i>
                            Projects
                        </a>
                        <div id="submenu-project" class="collapse submenu {{ request()->is('kt-admin/project/*') ? 'show' : '' }}" style="">
                            <ul class="nav flex-column">
                                @if (check(25,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('project.create') }}">Add Projects</a>
                                    </li>
                                @endif
                                @if (check(25,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('project.ready') }}">Ready Flats</a>
                                    </li>
                                @endif
                                @if (check(25,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('project.ongoing') }}">Ongoing Projects</a>
                                    </li>
                                @endif
                                @if (check(25,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('project.upcomming') }}">Upcoming Projects</a>
                                    </li>
                                @endif
                                @if (check(25,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('handover-project.index') }}">Handover
                                            Projects</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-manage" aria-controls="submenu-5">
                            <i class="fas fa-feather-alt"></i>
                            Management
                        </a>
                        <div id="submenu-manage" class="collapse submenu {{ request()->is('kt-admin/management/*') ? 'show' : '' }}" style="">
                            <ul class="nav flex-column">
                                @if (check(22,2, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('management.create') }}">Add</a>
                                    </li>
                                @endif
                                @if (check(22,1, $permissions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('management.index') }}">List</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>