<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorybook;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'categorybook_id',
        
    ];

    public function categorybook()
    {
        return $this->belongsTo(Categorybook::class);
    }

    public function getImagePathAttribute()
    {
        return Storage::disk("books")->url($this->thumbnail);
    }
    
}
