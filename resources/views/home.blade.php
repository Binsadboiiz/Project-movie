@extends('layouts.master')
@section('title', 'Home')
@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<script src="{{ asset('js/slides.js') }}"></script>
<script src="{{ asset('js/new-movie-list.js') }}"></script>
@csrf
    <div class="container-home">
        <h1 style="color: white"><i class="bi bi-fire" style="color: rgb(232, 116, 48)"></i>Top Trending </h1>
        <div class="slides-wrapper">
            <div class="slides" id="slides-container"></div>
            <button class="btn-prev" onclick="prevSlide()">&#10094;</button>
            <button class="btn-next" onclick="nextSlide()">&#10095;</button>
        </div>
        <br>
        <hr>
        <br>
        <div class="content">
            <div class="new-movie">
                <h1 style="color: white">New Movies</h1>
                <div class="new-movie-list-container"></div>
            </div>
        </div>
    </div>
@endsection
