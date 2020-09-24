@extends('template.app')

@section('in-head')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@endsection

@section('content')
	<div class="d-flex">
		<div class="flex-grow-1 mr-4">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" id="name" class="form-control" value="{{ $organization->name }}" readonly>
			</div>
			<div class="form-group">
				<label for="email">Description</label>
				<textarea id="description" cols="30" rows="10" class="form-control" readonly>{{ $organization->description }}</textarea>
			</div>
			<div class="form-group float-right">
				<a href="{{ route('organizations.edit', ['organization' => $organization]) }}">Edit</a>
			</div>
		</div>
		<div class="card flex-grow-1">
			<div class="card-header">{{ $organization->name }}'s People List</div>
			<div class="card-body">
				@if(count($organization->users()->get()) > 0)
					@foreach($organization->users()->get() as $user)
						<ul>
							<li>
								<a href="{{ route('users.show', ['user' => $user]) }}">{{ $user->name }}</a>
							</li>
						</ul>
					@endforeach
				@else
					<p class="text-muted text-center">
						No data found.
					</p>
				@endif
			</div>
		</div>
	</div>
@endsection
