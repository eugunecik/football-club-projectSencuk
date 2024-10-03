@extends('layouts.app')

@section('content')
    <h1>{{ $player->name }}</h1>
    <p><strong>Position:</strong> {{ $player->position }}</p>
    <p><strong>Birth Date:</strong> {{ $player->birth_date->format('d/m/Y') }}</p>
    <p><strong>Team:</strong> {{ $player->team->name }}</p>
    
    <a href="{{ route('players.edit', $player) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('players.index') }}" class="btn btn-secondary">Back to List</a>
@endsection