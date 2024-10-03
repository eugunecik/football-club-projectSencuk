@extends('layouts.app')

@section('content')
    <h1>Football Matches</h1>
    <a href="{{ route('matches.create') }}" class="btn btn-primary mb-3">Create New Match</a>
    <table class="table">
        <thead>
            <tr>
                <th>Home Team</th>
                <th>Away Team</th>
                <th>Stadium</th>
                <th>Date</th>
                <th>Score</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $match)
                <tr>
                    <td>{{ $match->homeTeam->name }}</td>
                    <td>{{ $match->awayTeam->name }}</td>
                    <td>{{ $match->stadium->name }}</td>
                    <td>{{ $match->match_date->format('d/m/Y H:i') }}</td>
                    <td>{{ $match->home_team_score }} - {{ $match->away_team_score }}</td>
                    <td>
                        <a href="{{ route('matches.show', $match) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('matches.edit', $match) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('matches.destroy', $match) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection