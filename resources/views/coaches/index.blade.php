@extends('layouts.app')

@section('content')
    <h1>Coaches</h1>
    <a href="{{ route('coaches.create') }}" class="btn btn-primary mb-3">Create New Coach</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Birth Date</th>
                <th>Team</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coaches as $coach)
                <tr>
                    <td>{{ $coach->name }}</td>
                    <td>{{ $coach->birth_date->format('d/m/Y') }}</td>
                    <td>{{ $coach->team->name }}</td>
                    <td>
                        <a href="{{ route('coaches.show', $coach) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('coaches.edit', $coach) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('coaches.destroy', $coach) }}" method="POST" style="display: inline-block;">
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