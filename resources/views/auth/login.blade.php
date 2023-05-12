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

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-5 mb-4">
                <div class="user_logo">
                    <img src="/images/logo.png" alt="User Logo">
                </div>
        
                <br><br><br>

                <div class="card mt-5">
                    <div class="card-body">
                        
                        <br>
                        <strong>LOG-IN</strong>
                        <hr>
        
                        @include('inc.messages') <!-- Show messages here -->
        
                        <form method="POST" action="{{ route('login') }}" id="myFormId">
                            @csrf
        
                            <div class="form-floating mb-2">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}" required>
                                <label for="email">Email address</label>
                            </div>
        
                            <div class="form-floating mb-2">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-info text-white" id="myButtonID">
                                    <i class="fas fa-arrow-circle-right"></i>
                                    Log-In
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">

        $('#myFormId').submit(function(){
            $("#myButtonID", this)
                .html('<i class="fas fa-spinner fa-spin"></i> Please Wait...')
                .attr('disabled', 'disabled');
            return true;
        });

    </script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
