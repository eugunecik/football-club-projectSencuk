@extends('layouts.app')

@section('content')
    <h1>{{ $stadium->name }}</h1>
    <p><strong>City:</strong> {{ $stadium->city }}</p>
    <p><strong>Capacity:</strong> {{ $stadium->capacity }}</p>
    <p><strong>Team:</strong> {{ $stadium->team ? $stadium->team->name : 'N/A' }}</p>
    
    <h2>Upcoming Matches</h2>
    <ul>
        @foreach($stadium->matches as $match)
            <li>{{ $match->homeTeam->name }} vs {{ $match->awayTeam->name }} - {{ $match->match_date->format('d/m/Y H:i') }}</li>
        @endforeach
    </ul>
    
    <a href="{{ route('stadiums.edit', $stadium) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('stadiums.index') }}" class="btn btn-secondary">Back to List</a>
@endsection