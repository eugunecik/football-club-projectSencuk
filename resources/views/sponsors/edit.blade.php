@extends('layouts.app')

@section('content')
    <h1>Edit Sponsor</h1>
    <form action="{{ route('sponsors.update', $sponsor) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $sponsor->name }}" required>
        </div>
        <div class="form-group">
            <label for="industry">Industry</label>
            <input type="text" class="form-control" id="industry" name="industry" value="{{ $sponsor->industry }}" required>
        </div>
        <div class="form-group">
            <label>Teams</label>
            @foreach($teams as $team)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="teams[]" value="{{ $team->id }}" id="team{{ $team->id }}"
                        {{ $sponsor->teams->contains($team->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="team{{ $team->id }}">
                        {{ $team->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Update Sponsor</button>
    </form>
@endsection