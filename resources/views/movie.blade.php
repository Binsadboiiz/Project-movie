@extends('layouts.master')
@section('title', 'Movies')
@section('content')
    @csrf
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}">
    <div class="movies-container">
        <h1>All Movies</h1>

        <div class="categories-filter">
            <form method="GET" action="{{ route('movie') }}">
                <select name="category" id="category" onchange="this.form.submit()" class="filter-select">
                    <option value="">All Categories</option>
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="movies-list-container">
            @forelse ($movies as $movie)
                <div class="movies-list">
                    <a href="{{ route('movie.detail', $movie->id) }}">
                        <img src="{{ $movie->image }}" alt="{{ $movie->title }}">
                    </a>
                    <div class="movies-info">
                        <h3>{{ $movie->title }}</h3>
                        <p>{{ $movie->subtitle }}</p>
                    </div>
                </div>
            @empty
                <p>No movies found.</p>
            @endforelse
        </div>
        <div class="pagination">
            {{ $movies->links() }}
        </div>
    </div>
@endsection
