<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/admin" class="brand-link">
                <img src="/lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Attendance App</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/lte/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="./profile" class="d-block">{{ Auth::user()->name }}</a>
                        <span class="text-muted">
                          {{ Auth::user()->type }}
                        </span>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            @if( Auth::user()->type == 'admin' )
                            <li class="nav-item">
                                <a href="/admin/home" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Data Karyawan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/attendance" class="nav-link">
                                    <i class="nav-icon fas fa-clipboard"></i>
                                    <p>
                                       Data Absen
                                    </p>
                                </a>
                            </li>
                            @else
                            
                            <li class="nav-item">
                                <a href="/user/home" class="nav-link">
                                    <i class="nav-icon fa fa-clipboard"></i>
                                    <p>
                                        Absensi
                                    </p>
                                </a>
                            </li>
                            
                              <li class="nav-item">
                                <a href="/user/profile/" class="nav-link">
                                    <i class="nav-icon fa fa-user"></i>
                                  <p>
                                    My Profile
                                  </p>
                                </a>
                              </li>                                                  
                            @endif
                            <li class="nav-item">
                                <form action="/logout" method="POST" id="formLogout">
                                    @csrf
                                    <a href="javascript:;" onclick="document.getElementById('formLogout').submit();" class="nav-link form-logout">
                                        <i class="nav-icon fa fa-sign-out-alt"></i>
                                        <p>
                                            Logout
                                        </p>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
