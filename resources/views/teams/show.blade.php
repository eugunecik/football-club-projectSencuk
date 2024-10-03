@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ $team->name }}</h1>
        </div>
        <div class="card-body">
            <p><strong>City:</strong> {{ $team->city }}</p>
            <p><strong>Founded:</strong> {{ $team->founded }}</p>
            
            <h2 class="mt-4">Players</h2>
            <ul class="list-group">
                @foreach($team->players as $player)
                    <li class="list-group-item">{{ $player->name }} - {{ $player->position }}</li>
                @endforeach
            </ul>
            
            <h2 class="mt-4">Coaches</h2>
            <ul class="list-group">
                @foreach($team->coaches as $coach)
                    <li class="list-group-item">{{ $coach->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('teams.edit', $team) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('teams.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
@endsection