<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;


class Categorybook extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
    
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
    
    public function getImagePathAttribute()
    {
        return Storage::disk("books")->url($this->thumbnail);
    }
}
