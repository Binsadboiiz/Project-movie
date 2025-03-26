@extends('layouts.master')
@section('title', 'Movie Detail - ' . $movie->title)
@section('content')
<link rel="stylesheet" href="{{ asset('css/movies.css') }}">
<style>
    .movie-detail-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .movie-detail-container img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    .movie-detail-container h1 {
        font-size: 2rem;
        margin-bottom: 10px;
    }
    .movie-detail-container p {
        margin-bottom: 10px;
        line-height: 1.6;
    }
    .back-link {
        display: inline-block;
        margin-bottom: 20px;
        color: #007bff;
        text-decoration: none;
    }
    .back-link:hover {
        text-decoration: underline;
    }
</style>
<div class="movie-detail-container">
    <a href="{{ route('movie') }}" class="back-link">&larr; Back to Movies</a>
    <h1>{{ $movie->title }}</h1>
    <img src="{{ $movie->image }}" alt="{{ $movie->title }}">
    <p><strong>Subtitle:</strong> {{ $movie->subtitle ?? 'N/A' }}</p>
    <p><strong>Description:</strong> {{ $movie->description ?? 'No description available.' }}</p>
</div>
@endsection
