<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }
    public function apiIndex()
    {
        $movies = Movie::all();
        return response()->json($movies);
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Movie::create($request->all());

        return redirect()->route('admin.movies.index')->with('success', 'Movie added successfully.');
    }

    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $movie->update($request->all()); // Cập nhật phim

        return redirect()->route('admin.movies.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete(); // Xóa phim

        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted successfully.');
    }
}
