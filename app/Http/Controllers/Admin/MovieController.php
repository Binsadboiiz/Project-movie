<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('categories')->get();
        return view('admin.movies.index', compact('movies'));
    }
    public function apiIndex()
    {
        $movies = Movie::all();
        return response()->json($movies);
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.movies.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|string',
            'description' => 'nullable|string',
            'director' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer|min:1900|max:2100',
            'categories' => 'nullable|array',
        ]);

        $movie = Movie::create($request->only('title', 'subtitle', 'image', 'description', 'director', 'country', 'release_year'));
        $movie->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.movies.index')->with('success', 'Movie added successfully.');
    }

    public function edit(Movie $movie)
    {
        $categories = \App\Models\Category::all();
        return view('admin.movies.edit', compact('movie', 'categories'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|string',
            'description' => 'nullable|string',
            'director' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer|min:1900|max:2100',
            'categories' => 'nullable|array',
        ]);

        $movie->update($request->only('title', 'subtitle', 'image', 'description', 'director', 'country', 'release_year'));
        $movie->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.movies.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete(); // Xóa phim

        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted successfully.');
    }
}
