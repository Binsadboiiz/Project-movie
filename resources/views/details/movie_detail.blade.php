@extends('layouts.master')
@section('title', 'Movie Detail - ' . $movie->title)
@section('content')
<link rel="stylesheet" href="{{ asset('css/movies.css') }}">
<link rel="stylesheet" href="{{ asset('css/detail-movies.css') }}">
<div class="movie-detail-container">
    <img src="{{ $movie->image }}" alt="{{ $movie->title }}">
    <div class="movie-detail-info">
        <a href="{{ route('movie') }}" class="back-link">&larr; Back to Movies</a>
        <h1>{{ $movie->title }}</h1>
        <p><strong>Subtitle:</strong> {{ $movie->subtitle ?? 'N/A' }}</p>
        <p><strong>Director:</strong> {{ $movie->director ?? 'Unknown' }}</p>
        <p><strong>Country:</strong> {{ $movie->country ?? 'Unknown' }}</p>
        <p><strong>Release Year:</strong> {{ $movie->release_year ?? 'Unknown' }}</p>
        <p><strong>Categories:</strong> {{ $movie->categories->pluck('name')->implode(', ') ?: 'No categories assigned' }}</p>
        <p><strong>Description:</strong> {{ $movie->description ?? 'No description available.' }}</p>
        <button type="submit" id="playmovie" style="background-color: red;"><i class="bi bi-play-fill"></i>Xem Phim</button><br></br>
        <form method="POST" action="{{ route('favorites.add') }}">
            @csrf
            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
            <button type="submit" id="addlist" style="background-color: blue;"><i class="bi bi-bookmark-fill"></i>Thêm vào yêu thích</button>
        </form>

    </div>
</div>
@endsection
