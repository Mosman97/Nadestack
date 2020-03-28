<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-text mx-3"><span>Nadestack</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link active" href="index.html"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="profile.html"><i class="fas fa-tasks"></i><span>Tasks</span></a><a class="nav-link" href="profile.html"><i class="fas fa-gamepad"></i><span>League</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('adminpanel_newsindex')}}"><i class="fas fa-newspaper"></i><span>News</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="profile.html"><i class="fas fa-ticket-alt"></i><span>Tickets</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('adminpanel_playerindex')}}"><i class="fas fa-user"></i><span>Players</span></a><a class="nav-link" href="profile.html"><i class="fas fa-users"></i><span>Teams</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('logout') }}"><i class="far fa-user-circle"></i><span>Logout</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
        </div>
    </div>
</nav>