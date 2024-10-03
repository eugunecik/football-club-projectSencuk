@extends('layouts.app')

@section('content')
    <h1>{{ $coach->name }}</h1>
    <p><strong>Birth Date:</strong> {{ $coach->birth_date->format('d/m/Y') }}</p>
    <p><strong>Team:</strong> {{ $coach->team->name }}</p>
    
    <a href="{{ route('coaches.edit', $coach) }}" class="btn btn-primary">Edit</a>
    <a href="{{ route('coaches.index') }}" class="btn btn-secondary">Back to List</a>
@endsection