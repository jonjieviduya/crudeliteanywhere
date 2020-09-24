@extends('template.app')

@section('in-head')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection

@section('content')
	<div class="d-flex">
		<div class="flex-grow-1 mr-4">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" id="name" class="form-control" value="{{ $user->name }}" readonly>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" id="email" class="form-control" value="{{ $user->email }}" readonly>
			</div>
			<div class="form-group float-right">
				<a href="{{ route('users.edit', ['user' => $user]) }}">Edit</a>
			</div>
		</div>
		<div class="card flex-grow-1">
			<div class="card-header">{{ $user->name }}'s Organizations List</div>
			<div class="card-body">
				@if(count($user->organizations()->get()) > 0)
					@foreach($user->organizations()->get() as $organization)
						<ul>
							<li>
								<a href="{{ route('organizations.show', ['organization' => $organization]) }}">{{ $organization->name }}</a>
							</li>
						</ul>
					@endforeach
				@else
					<p class="text-muted text-center">
						No organizations found.
					</p>
				@endif
			</div>
		</div>
	</div>
@endsection
