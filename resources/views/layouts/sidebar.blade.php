<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Testing App Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{Route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    @role('admin')
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>
        
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Component:</h6>
                <a class="collapse-item" href="{{Route('add-user')}}">New User</a>
                <a class="collapse-item" href="{{Route('admin-list')}}">Admin</a>
                <a class="collapse-item" href="{{Route('teacher-list')}}">Teacher</a>
                <a class="collapse-item" href="{{Route('student-list')}}">Student</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Exam Module</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{Route('exam-list')}}">Exam</a>
                <a class="collapse-item" href="{{Route('exam-instruction')}}">Exam Instructions</a>
                <a class="collapse-item" href="{{Route('subject-list')}}">Subject</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    

    <!-- Nav Item - Pages Collapse Menu -->
    
    @endrole

    @role('teacher')
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{Route('show-mcqs')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>MCQs</span></a>
    </li>
    @endrole

    @role('admin')
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{Route('show-mcqs')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>MCQs</span></a>
    </li>
    @endrole

    @role('admin')
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{Route('show-result')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Results</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{Route('show-feedback')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Feedbacks</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{Route('teacher-consultant-list')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Consultant</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{Route('add-role')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Roles</span>
        </a>
    </li>

    @endrole

   
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Logout</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->