@extends('layouts.app')

@section('content')
    <h1>Edit Coach</h1>
    <form action="{{ route('coaches.update', $coach) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $coach->name }}" required>
        </div>
        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $coach->birth_date->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="team_id">Team</label>
            <select class="form-control" id="team_id" name="team_id" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $coach->team_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Coach</button>
    </form>
@endsection