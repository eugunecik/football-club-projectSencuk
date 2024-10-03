@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Players</h1>
        <a href="{{ route('players.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Add New Player
        </a>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Birth Date</th>
                        <th>Team</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $player)
                        <tr>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->position }}</td>
                            <td>{{ $player->birth_date->format('d/m/Y') }}</td>
                            <td>{{ $player->team->name }}</td>
                            <td>
                                <a href="{{ route('players.show', $player) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('players.edit', $player) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('players.destroy', $player) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this player?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($players->isEmpty())
            <div class="alert alert-info" role="alert">
                No players found. <a href="{{ route('players.create') }}" class="alert-link">Add a new player</a>.
            </div>
        @endif
    </div>
@endsection

@push('styles')
<style>
    .table td, .table th {
        vertical-align: middle;
    }
</style>
@endpush