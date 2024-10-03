@extends('layouts.app')

@section('content')
    <h1>Sponsors</h1>
    <a href="{{ route('sponsors.create') }}" class="btn btn-primary mb-3">Create New Sponsor</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Industry</th>
                <th>Teams</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sponsors as $sponsor)
                <tr>
                    <td>{{ $sponsor->name }}</td>
                    <td>{{ $sponsor->industry }}</td>
                    <td>
                        @foreach($sponsor->teams as $team)
                            {{ $team->name }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('sponsors.show', $sponsor) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('sponsors.edit', $sponsor) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" style="display: inline-block;">
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