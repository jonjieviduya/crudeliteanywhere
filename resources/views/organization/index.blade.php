@extends('template.app')

@section('content')
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Created At</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@if(count($organizations) > 0)
				@foreach($organizations as $organization)
					<tr>
						<td>{{ $organization->name }}</td>
						<td>{{ $organization->description }}</td>
						<td>{{ $organization->created_at }}</td>
						<td class="d-flex">
							<a href="{{ route('organizations.show', ['organization' => $organization]) }}" class="btn btn-dark btn-sm mr-2">
								View
							</a>

							<a href="{{ route('organizations.edit', ['organization' => $organization]) }}" class="btn btn-primary btn-sm mr-2">
								Edit
							</a>
							
							<form action="{{ route('organizations.destroy', ['organization' => $organization]) }}" method="post" class="delete-form">
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
		{{ $organizations->links() }}

		<div>
			<a href="{{ route('organizations.create') }}" class="btn btn-dark float-md-right">Create</a>
		</div>
	</div>

@endsection

@section('end-body')
	<script>
		$(function(){
			$(document).on('submit', '.delete-form', function(){
				if(!confirm("Are you sure you want to delete this organization?")){
					return false;
				}
			});
		});
	</script>
@endsection
