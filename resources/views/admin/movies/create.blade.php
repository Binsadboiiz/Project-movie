@extends('layouts.master')

@section('title', 'Add Movie')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<div class="admin-container">
    <h1 class="admin-title">Add New Movie</h1>
    <form action="{{ route('admin.movies.store') }}" method="POST">
        @csrf
        <div class="admin-form-group">
            <label for="title" class="admin-form-label">Title</label>
            <input type="text" name="title" id="title" class="admin-form-control" required>
        </div>
        <div class="admin-form-group">
            <label for="subtitle" class="admin-form-label">Subtitle</label>
            <input type="text" name="subtitle" id="subtitle" class="admin-form-control">
        </div>
        <div class="admin-form-group">
            <label for="image" class="admin-form-label">Image URL</label>
            <input type="url" name="image" id="image" class="admin-form-control" required>
        </div>

        <div class="admin-form-group">
            <label for="director" class="admin-form-label">Director</label>
            <input type="text" name="director" id="director" class="admin-form-control">
        </div>
        <div class="admin-form-group">
            <label for="country" class="admin-form-label">Country</label>
            <input type="text" name="country" id="country" class="admin-form-control">
        </div>
        <div class="admin-form-group">
            <label for="release_year" class="admin-form-label">Release Year</label>
            <input type="number" name="release_year" id="release_year" class="admin-form-control" min="1900" max="{{ date('Y') }}">
        </div>
        <div class="admin-form-group">
            <label for="description" class="admin-form-label">Description</label>
            <textarea name="description" id="description" class="admin-form-control"></textarea>
        </div>
        <button type="submit" class="admin-btn">Add Movie</button>
    </form>
</div>
@endsection
