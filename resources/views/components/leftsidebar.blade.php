<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
      
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <!-- <li class="nav-item @yield('dashboard_select')">
                <a href="{{url('/admin/dashboard')}}" class="nav-link">
                    <i class="link-icon dashboard-icon" data-feather=""></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li> -->
            <li class="nav-item @yield('company_select')">
                <a href="{{url('admin/company-management')}}" class="nav-link">
                    <i class="link-icon side-user-icon" data-feather=""></i>
                    <span class="link-title">Company Management</span>
                </a>
            </li>
            <li class="nav-item @yield('employee_select')">
                <a href="{{url('admin/employee-management')}}" class="nav-link">
                    <i class="link-icon side-user-icon" data-feather=""></i>
                    <span class="link-title">Employee Management</span>
                </a>
            </li>
        </ul>
    </div>
</nav>













