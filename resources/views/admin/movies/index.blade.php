@extends('layouts.master')

@section('title', 'Manage Movies')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<div class="admin-container">
    <h1 class="admin-title">Manage Movies</h1>
    <a href="{{ route('admin.movies.create') }}" class="admin-btn admin-btn-primary">Add New Movie</a>
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>
                        <a href="{{ route('admin.movies.edit', $movie->id) }}" class="admin-btn admin-btn-warning">Edit</a>
                        <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="admin-btn admin-btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
