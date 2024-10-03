@extends('layouts.app')

@section('content')
    <h1>Create New Team</h1>
    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="founded">Founded Year</label>
            <input type="number" class="form-control" id="founded" name="founded" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Team</button>
    </form>
@endsection