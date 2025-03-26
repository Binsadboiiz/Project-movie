<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function showAllMovies(Request $request)
    {
        $search = $request->input('search');
        $movies = \App\Models\Movie::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                        ->orWhere('subtitle', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
        })->get();

        return view('movie', compact('movies'));
    }
    public function showMovieDetail($id)
    {
        $movie = \App\Models\Movie::findOrFail($id);
        return view('details.movie_detail', compact('movie'));
    }
}
