@extends('template.app')

@section('content')
    <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Eliteanywhere</h1>
    </div>
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                Person
            </div>
            <div class="card-body">
                <a href="{{ route('users.create') }}" class="btn btn-dark">Create</a>
                <a href="{{ route('users.index') }}" class="btn btn-primary">View All</a>
            </div>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                Organization
            </div>
            <div class="card-body">
                <a href="{{ route('organizations.create') }}" class="btn btn-dark">Create</a>
                <a href="{{ route('organizations.index') }}" class="btn btn-primary">View All</a>
            </div>
        </div>
    </div>
@endsection
