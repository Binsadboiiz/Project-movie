<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addToFavorites(Request $request)
    {
        $movieId = $request->input('movie_id');

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }

        $favorite = Favorite::firstOrCreate([
            'user_id' => Auth::id(),
            'movie_id' => $movieId,
        ]);

        return redirect()->back()->with('success', 'Movie added to your favorites!');
    }

    public function myList()
    {
        $favorites = Favorite::where('user_id', Auth::id())->with('movie')->get();

        return view('mylist', compact('favorites'));
    }
}
