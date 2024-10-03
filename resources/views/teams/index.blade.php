@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Teams</h1>
    <a href="{{ route('teams.create') }}" class="btn btn-primary mb-3">Create New Team</a>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Founded</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->city }}</td>
                        <td>{{ $team->founded }}</td>
                        <td>
                            <a href="{{ route('teams.show', $team) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('teams.destroy', $team) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection