<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'description',
        'director',
        'country',
        'release_year',
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_movie');
    }
}
