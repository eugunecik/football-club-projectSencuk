@extends('layouts.app')

@section('content')
    <h1>Create New Match</h1>
    <form action="{{ route('matches.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="home_team_id">Home Team</label>
            <select class="form-control" id="home_team_id" name="home_team_id" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="away_team_id">Away Team</label>
            <select class="form-control" id="away_team_id" name="away_team_id" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="stadium_id">Stadium</label>
            <select class="form-control" id="stadium_id" name="stadium_id" required>
                @foreach($stadiums as $stadium)
                    <option value="{{ $stadium->id }}">{{ $stadium->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="match_date">Match Date</label>
            <input type="datetime-local" class="form-control" id="match_date" name="match_date" required>
        </div>
        <div class="form-group">
            <label for="home_team_score">Home Team Score</label>
            <input type="number" class="form-control" id="home_team_score" name="home_team_score" min="0">
        </div>
        <div class="form-group">
            <label for="away_team_score">Away Team Score</label>
            <input type="number" class="form-control" id="away_team_score" name="away_team_score" min="0">
        </div>
        <button type="submit" class="btn btn-primary">Create Match</button>
    </form>
@endsection