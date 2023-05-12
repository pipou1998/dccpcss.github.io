<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="E-Learnings">
    <meta name="author" content="wils">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/images/logo.png">
    <title>{{ config('app.name', 'E-Learnings') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/font-awesome.js') }}"></script>

    <script src="{{ asset('js/jquery.printPage.js') }}"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-info">
        <!-- Navbar Brand
        <div class="navbar-brand ps-3">
            
        </div>-->

        <div class="navbar-brand ps-3">
            <img id="logo" src="/images/logo.png">
            <strong class="text-white">DCCP SHS CSS</strong>
        </div>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        
        <!-- Navbar Search-->
        <div class="ms-auto">

        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="rounded-circle" style="width:35px; height:35px;" src="/storage/avatar/{{ Auth::user()->avatar }}">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item bg-info text-white" href="#">
                            Welcome {{ Auth::user()->name }}!
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ url('/overview') }}">
                            <i class="fas fa-user fa-sm me-2"></i>
                            My Profile
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm me-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link {{ Route::currentRouteName() == "dashboard" ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <!-- <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> -->
                            <i class="fa-solid fa-gauge"></i> &nbsp;
                            Dashboard
                        </a>
                    @if(Auth::user()->role == "ADMIN")
                        <a class="nav-link {{ Request::path() == 'registered' ? 'active' : '' }} {{ Route::currentRouteName() == "register" ? 'active' : '' }}" href="{{ url('/registered') }}">
                            <!-- <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div> -->
                            <i class="fa-solid fa-user"></i> &nbsp;
                            Add Users
                        </a>
                    @endif
                    @if(Auth::user()->role == "INSTRUCTOR")
                        <a class="nav-link {{ Request::path() == 'registered' ? 'active' : '' }} {{ Route::currentRouteName() == "register" ? 'active' : '' }}" href="{{ url('/registered') }}">
                            <!-- <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div> -->
                            <i class="fa-solid fa-user"></i> &nbsp;
                            Add Student
                        </a>
                    @endif
                    @if(Auth::user()->role == "INSTRUCTOR")
                    <a class="nav-link {{ Request::path() == 'questiondashboard' ? 'active' : '' }} {{ Route::currentRouteName() == "questiondashboard" ? 'active' : '' }}" href="{{ url('/questiondashboard') }}">
                    <i class="fa-solid fa-gamepad"></i> &nbsp;
                        Make Quiz
                    </a> 
                    <a class="nav-link {{ Request::path() == 'viewApproved' ? 'active' : '' }} {{ Route::currentRouteName() == "viewApproved" ? 'active' : '' }}" href="{{ url('/viewApproved') }}">
                        <i class="fa-solid fa-check"></i> &nbsp;
                            Approved
                    </a>   
                    <a class="nav-link {{ Request::path() == 'viewdisapproved' ? 'active' : '' }} {{ Route::currentRouteName() == "viewdisapproved" ? 'active' : '' }}" href="{{ url('/viewdisapproved') }}">
                        <i class="fa-solid fa-circle-xmark"></i> &nbsp;
                            Disapproved
                    </a>
                    @endif
                    @if(Auth::user()->role=="STUDENT")
                    <a class="nav-link {{ Request::path() == 'takequizboard' ? 'active' : '' }} {{ Route::currentRouteName() == "takequizboard" ? 'active' : '' }}" href="{{ url('/takequizboard') }}">
                    <i class="fa-solid fa-gamepad"></i> &nbsp;
                        Take Quiz
                    </a>
                    <!-- <a class="nav-link {{ Request::path() == 'questions' ? 'active' : '' }} {{ Route::currentRouteName() == "questions" ? 'active' : '' }}" href="{{ url('/questions') }}">
                    <i class="fa-solid fa-gamepad"></i> &nbsp;
                        Take Quiz 1
                    </a>
                    <a class="nav-link {{ Request::path() == 'questions2' ? 'active' : '' }} {{ Route::currentRouteName() == "questions2" ? 'active' : '' }}" href="{{ url('/questions2') }}">
                    <i class="fa-solid fa-gamepad"></i> &nbsp;
                        Take Quiz 2
                    </a> -->
                    <a class="nav-link {{ Request::path() == 'drag' ? 'active' : '' }} {{ Route::currentRouteName() == "drag" ? 'active' : '' }}" href="{{ url('/drag') }}" target="_blank">
                    <i class="fa-solid fa-gamepad"></i> &nbsp;
                        Drag & Drop
                    </a>
                    <a class="nav-link {{ Request::path() == 'cable' ? 'active' : '' }} {{ Route::currentRouteName() == "cable" ? 'active' : '' }}" href="{{ url('/cable') }}" target="_blank">
                    <i class="fa-solid fa-gamepad"></i> &nbsp;
                        Lan Cable
                    </a>
                    <a class="nav-link" href="{{ url('/tutorial') }}">
                    <i class="fa-solid fa-gamepad"></i> &nbsp;
                        Tutorial and Modules
                    </a>
                    
                    @endif
                    @if(Auth::user()->role=="ADMIN" || Auth::user()->role=="INSTRUCTOR")
                    <a class="nav-link {{ Request::path() == 'sum-print' ? 'active' : '' }} {{ Route::currentRouteName() == "search.sum" ? 'active' : '' }}" href="{{ url('/sum-print') }}">
                    <i class="fa-sharp fa-solid fa-flag"></i> &nbsp;
                        Summary Report
                    </a>
                    @endif
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <strong>{{ Auth::user()->role }}</strong>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid mt-3 mb-3">

                    @yield('content')
                
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">
                            <span>Copyright &copy; E-Learnings 2022-{{ now()->year }}.</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-info" id="exampleModalLabel">Ready to Leave?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Cancel
                    </button>
                    <a class="btn btn-info text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" data-bs-dismiss="modal">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.btnPrint').printPage();
        });
    </script>

    <script type="text/javascript">

        $('#myFormId').submit(function(){
            $("#myButtonID", this)
                .html('<i class="fas fa-spinner fa-spin"></i> Please Wait...')
                .attr('disabled', 'disabled');
            return true;
        });

        $('#myFormId1').submit(function(){
            $("#myButtonID1", this)
                .html('<i class="fas fa-spinner fa-spin"></i> Please Wait...')
                .attr('disabled', 'disabled');
            return true;
        });
            
    </script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/scripts-toggle.js') }}"></script>
    <!-- <script src="{{ asset('js/custom.js') }}"></script> -->

</body>

</html>
