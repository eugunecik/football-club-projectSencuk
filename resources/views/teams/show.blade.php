@extends('layouts.app')

@section('content')
    <h1>{{ $team->name }}</h1>
    <p><strong>City:</strong> {{ $team->city }}</p>
    <p><strong>Founded:</strong> {{ $team->founded }}</p>
    
    <h2>Players</h2>
    <ul>
        @foreach($team->players as $player)
            <li>{{ $player->name }} - {{ $player->position }}</li>
        @endforeach
    </ul>
    
    <h2>Coaches</h2>
    <ul>
        @foreach($team->coaches as $coach)
            <li>{{ $coach->name }}</li>
        @endforeach
    </ul>
    
    <a href="{{ route('teams.edit', $team) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('teams.index') }}" class="btn btn-secondary">Back to List</a>
@endsection