@extends('layouts.app')

@section('content')
    <h1>Edit Team</h1>
    <form action="{{ route('teams.update', $team) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $team->city }}" required>
        </div>
        <div class="form-group">
            <label for="founded">Founded Year</label>
            <input type="number" class="form-control" id="founded" name="founded" value="{{ $team->founded }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Team</button>
    </form>
@endsection