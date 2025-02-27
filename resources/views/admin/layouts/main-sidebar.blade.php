<nav class="sidebar sidebar-offcanvas mt-lg-5 mt-sm-5" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset('admin/assets/images/faces/face1.jpg')}}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}</span>
                    <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Companies</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-office-building menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.companies.index')}}">Index</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.companies.create')}}">Create</a></li>
                      </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Employees</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-users  menu-icon" aria-hidden="true"></i>
            </a>
            <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.employees.index')}}">Index</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.employees.create')}}">Create</a></li>
                      </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Posts</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-office-building menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.posts.index')}}">Index</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.posts.create')}}">Create</a></li>
                </ul>
            </div>
        </li>


    </ul>
</nav>
