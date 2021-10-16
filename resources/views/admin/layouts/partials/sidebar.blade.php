<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link text-center">

        <img src="{{asset('images/logo.png')}}" alt="Merci Delivery" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">MERCI DLV</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('images/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('user.profile')}}" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{setActive('/')}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('product.index')}}"
                       class="nav-link {{setActive('product')}} {{setActive('product/*')}}">
                        <i class="nav-icon fas fa-gem"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>


                <li class="nav-item {{menuOpen('report')}} {{menuOpen('report/*')}} ">
                    <a href="{{route('report.index')}}"
                       class="nav-link {{setActive('report')}} {{setActive('report/*')}} ">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Reports

                        </p>
                    </a>
                </li>

                <li class="nav-item {{menuOpen('settings')}} {{menuOpen('settings/*')}}">
                    <a href="#" class="nav-link {{setActive('settings')}} {{setActive('settings/*')}}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="{{route('table.index')}}"
                               class="nav-link {{setActive('settings/table')}} {{setActive('settings/table/*')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tables</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('user.index')}}"
                               class="nav-link {{setActive('settings/users')}} {{setActive('settings/users/*')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('logs.index')}}" class="nav-link {{setActive('settings/logs')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Activity Logs</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('user.profile')}}"
                               class="nav-link {{setActive('settings/profile')}} {{setActive('settings/profile/*')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
