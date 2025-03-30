<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function donate() {
        return view('donate');
    }
    public function showAllMovies(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        $movies = \App\Models\Movie::with('categories')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%")
                            ->orWhere('subtitle', 'like', "%{$search}%");
            })
            ->when($category, function ($query, $category) {
                return $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('categories.id', $category);
                });
            })
            ->paginate(12);

        $movies->appends(['search' => $search, 'category' => $category]);
        return view('movie', compact('movies'));
    }
    public function showMovieDetail($id)
    {
        $movie = \App\Models\Movie::with('categories')->findOrFail($id);
        return view('details.movie_detail', compact('movie'));
    }
}
