@extends('layouts.app')

@section('content')
    <h1>Match Details</h1>
    <p><strong>Home Team:</strong> {{ $match->homeTeam->name }}</p>
    <p><strong>Away Team:</strong> {{ $match->awayTeam->name }}</p>
    <p><strong>Stadium:</strong> {{ $match->stadium->name }}</p>
    <p><strong>Date:</strong> {{ $match->match_date->format('d/m/Y H:i') }}</p>
    <p><strong>Score:</strong> {{ $match->home_team_score }} - {{ $match->away_team_score }}</p>
    
    <a href="{{ route('matches.edit', $match) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('matches.index') }}" class="btn btn-secondary">Back to List</a>
@endsection