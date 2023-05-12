@extends('layouts.master')

@section('content')

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('overview') ? 'active' : NULL }}" href="{{ url('overview') }}">
                <i class="fas fa-eye fa-sm me-2"></i>
                Overview
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('edit-info') ? 'active' : NULL }}" href="{{ url('edit-info') }}">
                <i class="fas fa-user-edit fa-sm me-2"></i>
                Edit Info
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('edit-password') ? 'active' : NULL }}" href="{{ url('edit-password') }}">
                <i class="fas fa-edit fa-sm me-2"></i>
                Edit Password
            </a>
        </li>
    </ul>

    <br>
    @include('inc.messages') <!-- Show messages here -->

    <div class="tab-content clearfix">
        <div id="{{ url('overview') }}" class="tab-pane {{ request()->is('overview') ? 'active' : NULL }}">
            <div class="row mt-3">
                <div class="col-md-3">
                    <img src="/storage/avatar/{{Auth::user()->avatar}}" class="img-thumbnail" width="240px" height="240px" alt="Profile Picture">
                </div>
                <div class="col-md-9">

                    <h3>
                        {{ Auth::user()->name }}
                    </h3>
                    <p>
                        <b>User ID</b> {{ Auth::user()->user_id }}
                    </p>
                    <p>
                        <b>Email</b> {{ Auth::user()->email }}
                    </p>
                    <p>
                        <b>CP #</b> {{ Auth::user()->cp }}
                    </p>
                    <p>
                        <b>Address</b> <br>
                        {!! nl2br(Auth::user()->address) !!}
                    </p>
                    <p>
                        <b>Role</b> {{ Auth::user()->role }}
                    </p>
                    <p>
                        <small><b>Date Registered</b> 
                            {{ date('d-m-Y', strtotime(Auth::user()->created_at)) }}
                            {{ date('h:i A', strtotime(Auth::user()->created_at)) }}
                        </small>
                    </p>

                </div>
            </div>
        </div>

        <div id="{{ url('edit-info') }}" class="tab-pane {{ request()->is('edit-info') ? 'active' : NULL }}">
            <div class="row mt-3">
                <div class="col-lg-6 mx-auto">

                    <div style="text-align:center;">
                        <img id="blah" src="/storage/avatar/{{Auth::user()->avatar}}" width="200px" height="200px" alt="Profile Picture" style="border-radius:50%;">
                    </div>

                    <form method="POST" action="{{ route('update.profile') }}" enctype="multipart/form-data" id="myFormId">
                        @csrf

                        <div style="text-align:center;" class="mt-2 mb-2">
                            <input id="avatar" type="file" name="avatar" onchange="readURL(this);">
                            <div id="browse-image">
                                Browse Image
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating mb-2">
                                    <input id="name" placeholder="Full Name" type="text" class="form-control" name="name" value="@if(old('name') == NULL){{ $user->name }}@else{{ old('name') }}@endif" required>
                                    <label for="name">Full Name</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating mb-2">
                                    <input id="cp" placeholder="Mobile Number" type="text" class="form-control" name="cp" value="@if(old('cp') == NULL){{ $user->cp }}@else{{ old('cp') }}@endif" required>
                                    <label for="cp">Mobile Number</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating mb-2">
                                    <textarea id="address" placeholder="Address" name="address" class="form-control" required>@if(old('address') == NULL){{ $user->address }}@else{{ old('address') }}@endif</textarea>
                                    <label for="address">Address</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-info text-white" id="myButtonID">
                                        <i class="fas fa-arrow-circle-right"></i>
                                        Edit Info
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <div id="{{ url('edit-password') }}" class="tab-pane {{ request()->is('edit-password') ? 'active' : NULL }}">
            <div class="row mt-3">
                <div class="col-lg-6 mx-auto">
                    
                    <form method="POST" action="{{ route('update.password') }}" id="myFormId1">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0" style="text-align:center;">Change Password</h5>
                            </div>

                            <div class="card-body">

                                <div class="form-floating mb-2">
                                    <input id="current_password" placeholder="Current Password" type="text" class="form-control" name="current_password" value="{{ old('current_password') }}" required>
                                    <label for="current_password">Current Password</label>
                                </div>

                                <div class="form-floating mb-2">
                                    <input id="new_password" placeholder="New Password" type="password" class="form-control" name="password" required>
                                    <label for="new_password">New Password</label>
                                </div>

                                <div class="form-floating mb-2">
                                    <input id="confirm_password" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                                    <label for="confirm_password">Confirm Password</label>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-info text-white" id="myButtonID1">
                                        <i class="fas fa-arrow-circle-right"></i>
                                        Change
                                    </button>
                                </div>
                                
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#avatar').hide();
        $('#browse-image').on('click', function() {
            $('#avatar').click();
        });
    </script>

@endsection
