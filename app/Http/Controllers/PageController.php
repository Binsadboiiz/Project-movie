<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function showAllMovies()
    {
        $movies = \App\Models\Movie::all();
        return view('movie', compact('movies'));
    }
    public function showMovieDetail($id)
    {
        $movie = \App\Models\Movie::findOrFail($id);
        return view('details.movie_detail', compact('movie'));
    }
}
