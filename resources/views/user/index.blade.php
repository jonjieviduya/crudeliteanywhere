@extends('template.app')

@section('content')
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Created At</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@if(count($users) > 0)
				@foreach($users as $user)
					<tr>
						<td>
							<a href="{{ route('users.show', ['user' => $user]) }}" title="View">{{ $user->name }}</a>
						</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->created_at }}</td>
						<td class="d-flex">
							<a href="{{ route('users.show', ['user' => $user]) }}" class="btn btn-dark btn-sm mr-2">
								View
							</a>

							<a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-primary btn-sm mr-2">
								Edit
							</a>
							
							<form action="{{ route('users.destroy', ['user' => $user]) }}" method="post" class="delete-form">
								@csrf
								{{ method_field('DELETE') }}
								<button class="btn btn-danger btn-delete btn-sm">
									Delete
								</button>
							</form>
						</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td class="text-muted text-center" colspan="4">No data found.</td>
				</tr>
			@endif
		</tbody>
	</table>
	
	<div class="d-flex justify-content-between">
		{{ $users->links() }}

		<div>
			<a href="{{ route('users.create') }}" class="btn btn-dark float-md-right">Create</a>
		</div>
	</div>

@endsection


@section('end-body')
	<script>
		$(function(){
			$(document).on('submit', '.delete-form', function(){
				if(!confirm("Are you sure you want to delete this person?")){
					return false;
				}
			});
		});
	</script>
@endsection
