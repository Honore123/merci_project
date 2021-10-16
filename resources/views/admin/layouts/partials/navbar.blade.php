<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>


    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
               {{auth()->user()->name}}
            </a>
            <div class="dropdown-menu  dropdown-menu-right">
                <a href="{{route('user.profile')}}" class="dropdown-item">
                  My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item"
                   onclick="event.preventDefault();document.getElementById('UserLogOutForm').submit();"
                >
                   Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
