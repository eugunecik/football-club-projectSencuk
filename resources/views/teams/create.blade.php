@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Create New Team</h1>
    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="mb-3">
            <label for="founded" class="form-label">Founded Year</label>
            <input type="number" class="form-control" id="founded" name="founded" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Team</button>
    </form>
@endsection