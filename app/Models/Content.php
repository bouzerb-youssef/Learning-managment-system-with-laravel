<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'title1',
        'description1',
        'button1',
        'hero_image1',
        'title2', 
        'description2', 
        'button2',
        'image2', 
        'title3',
        'description3',  
        'button3',
    ];
    public function getHeroImagePathAttribute()
    {
        return Storage::disk("content")->url($this->hero_image1);
    }
    public function getImagePathAttribute()
    {
        return Storage::disk("content")->url($this->image2);
    }

}
