@extends('layouts.app')

@section('content')
    <h1>Stadiums</h1>
    <a href="{{ route('stadiums.create') }}" class="btn btn-primary mb-3">Create New Stadium</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Capacity</th>
                <th>Team</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stadiums as $stadium)
                <tr>
                    <td>{{ $stadium->name }}</td>
                    <td>{{ $stadium->city }}</td>
                    <td>{{ $stadium->capacity }}</td>
                    <td>{{ $stadium->team ? $stadium->team->name : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('stadiums.show', $stadium) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('stadiums.edit', $stadium) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('stadiums.destroy', $stadium) }}" method="POST" style="display: inline-block;">
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