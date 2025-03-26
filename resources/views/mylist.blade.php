@extends('layouts.master')
@section('title', 'My List')
@section('content')
<style>
    .my-list-container {
    margin: 0 auto;
    padding: 20px;
    max-width: 80%;
    height: auto;
    background-color: #1f1e1e;
    }
    .favorites {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 20px;
    }
    .favorite-item {
    position: relative;
    width: 100%;
    }
    .my-list-conatainer img {
    width: 100%;
    display: block;
    border-radius: 10px;
    }
    .favorite-info {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    border-radius: 0 0 10px 10px;
    padding: 5px;
    background-color: rgba(0, 0, 0, 0.605);
    color: white;
    text-align: center;
    z-index: 1;
    }
    .favorite-item img:hover {
    cursor: pointer;
    transform: scale(1.05);
    transition: transform 0.3s ease;
    }
</style>
<div class="my-list-container">
    <h1>My List</h1>
    <div class="favorites">
        @forelse ($favorites as $favorite)
        <div class="favorite-item">
            <a href="{{ route('movie.detail', $favorite->movie->id)}}">
                <img src="{{ $favorite->movie->image }}" alt="{{ $favorite->movie->title }}">
            </a>
            <div class="favorite-info">
                <h3>{{ $favorite->movie->title }}</h3>
                <p>{{ $favorite->movie->subtitle }}</p>
            </div>
        </div>
        @empty
            <p>You have no favorite movies yet.</p>
        @endforelse
    </div>
</div>
@endsection
