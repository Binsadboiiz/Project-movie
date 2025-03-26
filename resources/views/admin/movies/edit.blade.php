@extends('layouts.master')

@section('title', 'Edit Movie')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<div class="admin-container">
    <h1 class="admin-title">Edit Movie</h1>
    <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="admin-form-group">
            <label for="title" class="admin-form-label">Title</label>
            <input type="text" name="title" id="title" class="admin-form-control" value="{{ $movie->title }}" required>
        </div>
        <div class="admin-form-group">
            <label for="subtitle" class="admin-form-label">Subtitle</label>
            <input type="text" name="subtitle" id="subtitle" class="admin-form-control" value="{{ $movie->subtitle }}">
        </div>
        <div class="admin-form-group">
            <label for="image" class="admin-form-label">Image URL</label>
            <input type="text" name="image" id="image" class="admin-form-control" value="{{ $movie->image }}" required>
        </div>
        <div class="admin-form-group">
            <label for="description" class="admin-form-label">Description</label>
            <textarea name="description" id="description" class="admin-form-control">{{ $movie->description }}</textarea>
        </div>
        <button type="submit" class="admin-btn">Update Movie</button>
    </form>
</div>
@endsection
