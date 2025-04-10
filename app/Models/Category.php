<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'category_movie');
    }
}
