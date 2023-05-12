@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                   
                    <div class="col-md-6">
                        <form method="get" action="{{ route('search.user') }}">
                            <div class="input-group">

                                <input placeholder="search..." type="text" class="form-control" name="search">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fas fa-search"></i>
                                </button>
                            
                            </div>
                        </form>
                    </div>
                
                    <div class="col">
                        <div class="float-end">
                            <a href="{{ url('/register') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-user-plus fa-sm me-1"></i>Register</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

            @include('inc.messages') <!-- Show messages here -->
            
            @if(count($users) > 0)
                <div class="table-responsive">
                    <table class="table table-sm table-hover" style="white-space:nowrap;">
                        <tr>
                            <th></th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Date Registered</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img style="width:50px; height:50px;" src="/storage/avatar/{{ $user->avatar }}" alt="Profile Picture">
                            </td>
                            <td>{{ $user->user_id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->cp }}</td>
                            <td>{!! nl2br($user->address) !!}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                {{ date('d-m-Y', strtotime($user->created_at)) }}
                                {{ date('h:i A', strtotime($user->created_at)) }}
                            </td>
                            <td>
                                @if($user->status == 1)
                                    <strong class="text-success">Active</strong>
                                @else
                                    <strong class="text-danger">Deactive</strong>
                                @endif
                            </td>
                            <td>

                                @if($user->role != "ADMIN")

                                    <div class="btn-group">

                                    @if($user->status == 1)
                                    
                                        <button title="Deactivate Account" type="button" class="btn btn-sm btn-outline-danger" id="deactivate" data-user_id="{{ $user->user_id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}">
                                            <i class="fas fa-lock"></i>
                                        </button>

                                    @else
                                        
                                        <button title="Activate Account" type="button" class="btn btn-sm btn-outline-success" id="activate" data-user_id="{{ $user->user_id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}">
                                            <i class="fas fa-unlock-alt"></i>
                                        </button>

                                    @endif

                                    </div>

                                @else
                                    . . .
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach

                    </table>
                </div>

                <p>
                    {{ $users->links() }}
                </p>

            @else
                <p class="text-muted">No User.</p>
            @endif

            </div>
        </div>
    </div>
</div>

<!-- Script for Activate -->
<script>
    $(document).ready(function() {
        /**
        * for showing return item popup
        */
        $(document).on('click', "#activate", function() {
            $(this).addClass('activate-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
    
            // var options = {
            //     'backdrop': 'static'
            // };

            $('#activate-modal').modal("show")
        })

        // on modal show
        $('#activate-modal').on('show.bs.modal', function() {
            var el = $(".activate-trigger-clicked"); // See how its usefull right here? 
            var row = el.closest(".data-row");
    
            // get the data
            var activate_user_id = el.data('user_id');
            var activate_name = el.data('name');
            var activate_email = el.data('email');
            
            // fill the data in the input fields
            $("#activate_user_id").val(activate_user_id);
            $("#activate_name").html(activate_name);
            $("#activate_email").html(activate_email);
        })

        // on modal hide
        $('#activate-modal').on('hide.bs.modal', function() {
            $('.activate-trigger-clicked').removeClass('activate-trigger-clicked')
            $("#activate-form").trigger("reset");
        })
    })
</script>
<!-- End Script for Activate -->

<!-- Activate Modal -->
<div class="modal fade" id="activate-modal" tabindex="-1" aria-labelledby="activate-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="activate-modal-label">
                    Activate Account?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="activate-form" class="form-horizontal" method="POST" action="{{ route('activate') }}">
                @csrf

                <div class="modal-body" id="attachment-body-content">
                   
                    <input type="hidden" name="activate_user_id" id="activate_user_id">

                    <p>
                        <strong>Name: </strong><i id="activate_name"></i>
                    </p>

                    <p>
                        <strong>Email: </strong><i id="activate_email"></i>
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="activate-button">
                        <i class="fas fa-unlock-alt"></i>
                        Activate
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- End Activate Modal -->

<script>
    $('#activate-form').submit(function(){
        $("#activate-button", this)
            .html('<i class="fas fa-spinner fa-spin"></i> Please Wait...')
            .attr('disabled', 'disabled');
        return true;
    });
</script>

<!-- Script for Deactivate -->
<script>
    $(document).ready(function() {
        /**
        * for showing return item popup
        */
        $(document).on('click', "#deactivate", function() {
            $(this).addClass('deactivate-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
            
            // var options = {
            //     'backdrop': 'static'
            // };

            $('#deactivate-modal').modal("show")
        })

        // on modal show
        $('#deactivate-modal').on('show.bs.modal', function() {
            var el = $(".deactivate-trigger-clicked"); // See how its usefull right here? 
            var row = el.closest(".data-row");
    
            // get the data
            var deactivate_user_id = el.data('user_id');
            var deactivate_name = el.data('name');
            var deactivate_email = el.data('email');
            
            // fill the data in the input fields
            $("#deactivate_user_id").val(deactivate_user_id);
            $("#deactivate_name").html(deactivate_name);
            $("#deactivate_email").html(deactivate_email);
        })

        // on modal hide
        $('#deactivate-modal').on('hide.bs.modal', function() {
            $('.deactivate-trigger-clicked').removeClass('deactivate-trigger-clicked')
            $("#deactivate-form").trigger("reset");
        })
    })
</script>
<!-- End Script for Deactivate -->

<!-- Deactivate Modal -->
<div class="modal fade" id="deactivate-modal" tabindex="-1" aria-labelledby="deactivate-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deactivate-modal-label">
                    Deactivate Account?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="deactivate-form" class="form-horizontal" method="POST" action="{{ route('deactivate') }}">
                @csrf

                <div class="modal-body" id="attachment-body-content">
                   
                    <input type="hidden" name="deactivate_user_id" id="deactivate_user_id">

                    <p>
                        <strong>Name: </strong><i id="deactivate_name"></i>
                    </p>

                    <p>
                        <strong>Email: </strong><i id="deactivate_email"></i>
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" id="deactivate-button">
                        <i class="fas fa-lock"></i>
                        Deactivate
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- End Deactivate Modal -->

<script>
    $('#deactivate-form').submit(function(){
        $("#deactivate-button", this)
            .html('<i class="fas fa-spinner fa-spin"></i> Please Wait...')
            .attr('disabled', 'disabled');
        return true;
    });
</script>

@endsection
