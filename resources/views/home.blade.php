@extends('layouts.master')
@section('title', 'Home')
@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="{{ asset('js/slides.js') }}"></script>
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
            <div class="row">
                <div class="col-md-4">
                    <h2>About Us</h2>
                    <p>We are a team of passionate developers dedicated to creating innovative solutions that make a difference.</p>
                </div>
                <div class="col-md-4">
                    <h2>Contact Us</h2>
                    <p>If you have any questions or feedback, feel free to reach out to us at
    </div>
@endsection
