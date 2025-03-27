@extends('layouts.master')
@section('title', 'My List')
@section('content')
<link rel="stylesheet" href="{{ asset('css/mylist.css')}}">
<div class="my-list-container">
    <h1 style="color: white">My List</h1>
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
