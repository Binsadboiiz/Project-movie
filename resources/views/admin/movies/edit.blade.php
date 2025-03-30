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
            <label for="director" class="admin-form-label">Director</label>
            <input type="text" name="director" id="director" class="admin-form-control" value="{{ $movie->director }}">
        </div>
        <div class="admin-form-group">
            <label for="country" class="admin-form-label">Country</label>
            <input type="text" name="country" id="country" class="admin-form-control" value="{{ $movie->country }}">
        </div>
        <div class="admin-form-group">
            <label for="release_year" class="admin-form-label">Release Year</label>
            <input type="number" name="release_year" id="release_year" class="admin-form-control" value="{{ $movie->release_year }}" min="1900" max="{{ date('Y') }}">
        </div>
        <div class="admin-form-group">
            <label for="description" class="admin-form-label">Description</label>
            <textarea name="description" id="description" class="admin-form-control">{{ $movie->description }}</textarea>
        </div>
        <div class="admin-form-group">
            <label for="categories" class="admin-form-label">Categories</label>
            <select name="categories[]" id="categories" class="admin-form-control" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $movie->categories->contains($category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple categories.</small>
        </div>
        <button type="submit" class="admin-btn">Update Movie</button>
    </form>
</div>
@endsection
