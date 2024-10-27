<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="EcoTour Uganda Admin Panel">
    <meta name="author" content="EcoTour Team">
    <title>EcoTour Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ route('admin.dashboard') }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <div class="sidebar-brand-text mx-3">EcoTour Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Management Sections -->
            <div class="sidebar-heading">Management</div>

            <!-- Users Management -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Manage Users</span>
                </a>
            </li>

            <!-- Experiences Management -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.experiences') }}">
                    <i class="fas fa-fw fa-hiking"></i>
                    <span>Manage Experiences</span>
                </a>
            </li>

            <!-- Reviews Management -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.reviews') }}">
                    <i class="fas fa-fw fa-star"></i>
                    <span>Manage Reviews</span>
                </a>
            </li>

            <!-- Bookings Management -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.bookings') }}">
                    <i class="fas fa-fw fa-calendar-check"></i>
                    <span>Manage Bookings</span>
                </a>
            </li>

            <!-- Reported Experiences -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.reported-experiences') }}">
                    <i class="fas fa-fw fa-flag"></i>
                    <span>Reported Experiences</span>
                </a>
            </li>

            <!-- Payments -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.payments') }}">
                    <i class="fas fa-fw fa-credit-card"></i>
                    <span>Payments</span>
                </a>
            </li>

            <!-- Reports -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.reports') }}">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Reports</span>
                </a>
            </li>

            <!-- Notifications -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.notifications') }}">
                    <i class="fas fa-fw fa-bell"></i>
                    <span>Notifications</span>
                </a>
            </li>

            <!-- Settings -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.settings') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Settings</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Logout Form -->
            <div class="sidebar-card d-none d-lg-flex">
                <form action="{{ route('logout') }}" method="POST" class="text-center">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Log Out</button>
                </form>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h4>EcoTour Uganda - Admin Panel</h4>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->username }}</span>
                                <i class="fas fa-user-circle fa-2x text-gray-600"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    {{ $slot }}
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>

    @livewireScripts
    @stack('scripts')
</body>

</html>
