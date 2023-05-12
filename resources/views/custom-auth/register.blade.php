@extends('layouts.master')

@section('content')

<div class="row justify-content-md-center">
	<div class="col-lg-6">
		
		<div class="card">
			<div class="card-header">
				<a class="btn btn-outline-secondary btn-sm" href="{{ url('/registered') }}"><i class="fa fa-arrow-left fa-sm"></i> Back</a> | <strong>REGISTER</strong>
			</div>
			<div class="card-body">

				@include('inc.messages') <!-- Show messages here -->

				<form method="POST" action="{{ route('custom.register') }}" id="myFormId">
                    @csrf
					<div class="form-floating mb-2">
						<input id="name" placeholder="Full Name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
						<label for="name">Full Name: (ex. First Name, M.I, Last Name)</label>
					</div>

					<div class="form-floating mb-2">
						<input id="cp" placeholder="Mobile Number" type="text" class="form-control" name="cp" value="{{ old('cp') }}" required>
						<label for="cp">Mobile Number</label>
					</div>

					<div class="form-floating mb-2">
						<textarea id="address" placeholder="Address" name="address" class="form-control" required>{{ old('address') }}</textarea>
						<label for="address">Address</label>
					</div>

					<div class="form-floating mb-2">
						<input id="email" placeholder="Email Address" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
						<label for="email">Email Address</label>
					</div>

					<div class="form-floating mb-2">
						<input id="password" placeholder="Create password" type="password" class="form-control" name="password" required>
						<label for="password">Create password</label>
					</div>

					<div class="form-floating mb-2">
						<input id="password_confirmation" placeholder="Confirm password" type="password" class="form-control" name="password_confirmation" required>
						<label for="password_confirmation">Confirm password</label>
					</div>

					<div class="form-floating mb-2">
						<select class="form-select" name="role" id="roleSelect" aria-label="Role Select">
							<option value="" disabled>-Select One-</option>

							@if(Auth::user()->role == "INSTRUCTOR")
								<option value="STUDENT" @if (old('role') == 'STUDENT') selected="selected" @endif>STUDENT</option>
                    		@endif

							@if(Auth::user()->role == "ADMIN")
								<option value="STUDENT" @if (old('role') == 'STUDENT') selected="selected" @endif>STUDENT</option>
								<option value="INSTRUCTOR" @if (old('role') == 'INSTRUCTOR') selected="selected" @endif>INSTRUCTOR</option>
                    		@endif

							
							
						</select>
						<label for="roleSelect">Role</label>
					</div>

					@if(Auth::user()->role == "ADMIN")
						<div class="form-floating mb-2">
							<select class="form-select" name="under" id="underSelect" aria-label="Under Select">

								<option value="" disabled>-Select One-</option>
								<option value="0">NONE</option>

								@foreach($users as $user)

									<option value="{{ $user->user_id }}">{{ $user->name }}</option>

								@endforeach
								
							</select>
							<label for="underSelect">Under</label>
						</div>
                    @endif

					

					<div class="d-grid gap-2">
						<button type="submit" class="btn btn-info text-white" id="myButtonID">
							<i class="fas fa-arrow-circle-right"></i>
							Register
						</button>
					</div>

				</form>
			</div>
		</div>

	</div>
</div>

@endsection
