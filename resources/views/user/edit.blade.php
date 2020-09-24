@extends('template.app')

@section('in-head')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection

@section('content')
	<form action="{{ route('users.update', ['user' => $user]) }}" method="post">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control{{ ($errors->has('name')) ? ' is-invalid' : '' }}" value="{{ old('name') ?: $user->name }}" required>
			@if($errors->has('name'))
				<small class="form-text text-muted">{{ $errors->first('name') }}</small>
			@endif
		</div>
		<div class="form-group">
			<label for="organizations">Select Organizations</label>
			<select name="organizations[]" id="organizations" class="form-control" multiple="multiple">
				@foreach($organizations as $organization)
					<option></option>
					<option value="{{ $organization->id }}"
						{{ collect(old('organizations'))->contains($organization->id) ? ' selected' : '' }}
						{{ (in_array($organization->id, $user_organizations_id)) ? ' selected' : ''  }}>
						{{ $organization->name }}
					</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" class="form-control{{ ($errors->has('email')) ? ' is-invalid' : '' }}" value="{{ old('email') ?: $user->email }}" required autocomplete="off">
			@if($errors->has('email'))
				<small class="form-text text-muted">{{ $errors->first('email') }}</small>
			@endif
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control{{ ($errors->has('password')) ? ' is-invalid' : '' }}">
			@if($errors->has('password'))
				<small class="form-text text-muted">{{ $errors->first('password') }}</small>
			@endif
		</div>
		<button class="btn btn-primary">Save Changes</button>

		{{ method_field('PUT') }}
		@csrf
	</form>
@endsection

@section('end-body')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
	<script>
		$(function(){
			$('#organizations').select2({
				placeholder: 'Select Organizations'
			});
		});
	</script>
@endsection
