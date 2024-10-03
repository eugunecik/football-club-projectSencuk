@extends('layouts.app')

@section('content')
    <h1>{{ $sponsor->name }}</h1>
    <p><strong>Industry:</strong> {{ $sponsor->industry }}</p>
    
    <h2>Sponsored Teams</h2>
    <ul>
        @foreach($sponsor->teams as $team)
            <li>{{ $team->name }}</li>
        @endforeach
    </ul>
    
    <a href="{{ route('sponsors.edit', $sponsor) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('sponsors.index') }}" class="btn btn-secondary">Back to List</a>
@endsection