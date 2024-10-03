@extends('layouts.app')

@section('content')
    <h1>Edit Stadium</h1>
    <form action="{{ route('stadiums.update', $stadium) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $stadium->name }}" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $stadium->city }}" required>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $stadium->capacity }}" required min="0">
        </div>
        <div class="form-group">
            <label for="team_id">Team</label>
            <select class="form-control" id="team_id" name="team_id">
                <option value="">No Team</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $stadium->team_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Stadium</button>
    </form>
@endsection