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

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/font-awesome.js') }}"></script>
</head>

<body>
    <div class="card text-center">
        <div class="card-header bg-info text-white">
            <img src="/images/logo.png" alt="LOGO" width="50px" height="50px">
            E-Learnings
        </div>
        <div class="card-body">
            <h5 class="card-title">
                Hi! {{ Auth::user()->name }} <small>/ {{ Auth::user()->email }}</small>
            </h5>
            <p class="card-text">
                You will not be able to access our system, Because your account was deactivated. <br>
                To activate your account, kindly contact our administrator. Thank you! <br>
                <a href=".">Click to refresh the page.</a>
            </p>

            <a href="#" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>

        </div>
        <div class="card-footer">
            <span>Copyright &copy; E-Learnings 2022-{{ now()->year }}.</span>
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

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    
</body>

</html>
