<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll">
            <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="row">
                            <div class="sidebar-userpic">
                                {{-- {{Auth::user()}} --}}
                                <img src="{{asset(Auth::user()->avatar)}}" class="img-responsive" alt=""> </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name"> {{Auth::user()->name}} </div>
                            <div class="profile-usertitle-job"> {{Auth::user()->role->display_name}} </div>
                        </div>
                        
                    </div>
                </li>
                <li class="nav-item start ">
                    <a href="{{url('/admin')}}" class="nav-link nav-toggle">
                        <i class="material-icons">dashboard</i>
                        <span class="title">Dashboard</span>
                        {{-- <span class="selected"></span> --}}
                        {{-- <span class="arrow open"></span> --}}
                    </a>
                    {{-- <ul class="sub-menu">
                        <li class="nav-item active">
                            <a href="#" class="nav-link ">
                                <span class="title">Dashboard 1</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link ">
                                <span class="title">Dashboard 2</span>
                            </a>
                        </li>
                    </ul> --}}
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">email</i>
                        <span class="title">Email</span>
                        <span class="arrow"></span>
                        <span class="label label-rouded label-menu label-danger">new</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="email_inbox.html" class="nav-link ">
                                <span class="title">Inbox</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="email_view.html" class="nav-link ">
                                <span class="title">View Mail</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="email_compose.html" class="nav-link ">
                                <span class="title">Compose Mail</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('staff.index')}}" class="nav-link nav-toggle">
                        <i class="material-icons">group</i>
                        <span class="title">Nh??n vi??n</span>
                        {{-- <span class="arrow"></span> --}}
                    </a>
                    {{-- <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="add_staff.html" class="nav-link ">
                                <span class="title">Th??m nh??n vi??n</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="all_staffs.html" class="nav-link ">
                                <span class="title">T???t c??? nh??n vi??n</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="edit_staff.html" class="nav-link ">
                                <span class="title">S???a th??ng tin nh??n vi??n</span>
                            </a>
                        </li>
                    </ul> --}}
                </li>
                <li class="nav-item">
                    <a href="{{route('equipment.index')}}">
                        <i class="material-icons"> laptop_chromebook</i>
                        <span class="title">Thi???t b???</span>
                        {{-- <span class="arrow"></span> --}}
                    </a>
                </li> <li class="nav-item">
                    <a href="{{route('service.index')}}">
                        <i class="material-icons">dvr</i>
                        <span class="title">D???ch v???</span>
                        {{-- <span class="arrow"></span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="material-icons">class</i>
                        <span class="title">C??c lo???i ph??ng</span>
                        {{-- <span class="arrow"></span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('room.index')}}" class="nav-link nav-toggle">
                        <i class="material-icons">vpn_key</i>
                        <span class="title">Danh s??ch ph??ng</span>
                        {{-- <span class="arrow"></span> --}}
                    </a>
                    {{-- <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <span class="title">C??c lo???i ph??ng</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('room.index')}}" class="nav-link ">
                                <span class="title">Danh s??ch ph??ng</span>
                            </a>
                        </li>
                    </ul> --}}
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">business_center</i>
                        <span class="title">Booking</span>
                        {{-- <span class="arrow"></span> --}}
                    </a>
                    {{-- <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <span class="title">Th??m Booking</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <span class="title">View Booking</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <span class="title">Edit Booking</span>
                            </a>
                        </li>
                    </ul> --}}
                </li>
               
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">settings</i>
                        <span class="title">C??i ?????t</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link nav-toggle">
                        <i class="material-icons"> exit_to_app</i>
                        <span class="title">????ng xu???t</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>