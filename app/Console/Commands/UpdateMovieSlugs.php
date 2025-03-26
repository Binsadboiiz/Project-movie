<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;
use Illuminate\Support\Str;

class UpdateMovieSlugs extends Command
{
    protected $signature = 'movies:update-slugs';
    protected $description = 'Update slugs for all movies based on their titles';

    public function handle()
    {
        $movies = Movie::all();
        if ($movies->isEmpty()) {
            $this->info('No movies found to update.');
            return;
        }

        foreach ($movies as $movie) {
            $movie->update(['slug' => Str::slug($movie->title)]);
            $this->info("Updated slug for movie: {$movie->title} -> {$movie->slug}");
        }

        $this->info('All movie slugs updated successfully.');
    }
}
