@extends('template.app')

@section('content')
	<form action="{{ route('organizations.store') }}" method="post">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control{{ ($errors->has('name')) ? 'is-invalid' : '' }}" value="{{ old('name') }}" required>
			@if($errors->has('name'))
				<small class="form-text text-muted">{{ $errors->first('name') }}</small>
			@endif
		</div>

		<div class="form-group">
			<label for="description">Desctiption</label>
			<textarea name="description" id="description" cols="30" rows="10" class="form-control" required="">{{ old('description') }}</textarea>
		</div>

		<button class="btn btn-dark">Create</button>
		@csrf
	</form>
@endsection
