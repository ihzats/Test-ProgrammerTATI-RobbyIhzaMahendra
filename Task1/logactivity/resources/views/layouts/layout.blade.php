<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/styles.min.css') }}" />

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                        <h2>Dashboard <br> <?php  if (Auth::user()->type == "kepdang") {
                            echo "Kepala Bidang";
                        } else if (Auth::user()->type == "kepdin") {
                            echo "Kepala Dinas";
                        } else {
                            echo "Staff";
                        }
                        ?></h2>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Menu</span>
                        </li>
                        @if (Auth::user()->type == "kepdin")
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('dashboard')}}" aria-expanded="false">
                                <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Activity Aproval</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('users.index')}}" aria-expanded="false">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">User Management</span>
                            </a>
                        </li>
                        @elseif (Auth::user()->type == "kepdang")
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('dashboard')}}" aria-expanded="false">
                                <i class="ti ti-layout-dashboard"></i>
                               </span>
                               <span class="hide-menu">Dashboard</span>
                           </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('aproval')}}" aria-expanded="false">
                                <i class="ti ti-file-description"></i></span>
                                <span class="hide-menu">Activity Aproval</span>
                            </a>
                        </li>
                        @else
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('dashboard')}}" aria-expanded="false">
                                <i class="ti ti-layout-dashboard"></i>
                               </span>
                               <span class="hide-menu">Dashboard</span>
                           </a>
                        </li>
                        @endif

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>

                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ URL::asset('assets/images/profile/user-1.jpg') }}" alt="profile"
                                        width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            @yield('content')
        </div>
    </div>
    </div>
    <script src="{{ URL::asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.js') }}"></script>
</body>

</html>
