<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\Category;
use App\Models\Question;
use App\Models\Enroll;
use App\Models\Option;
use App\Models\Material;
use App\Models\whatinthecoure;
use Illuminate\Support\Facades\Storage;


class Cource extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'title',
        'short_description',
        'desc',
        //'level',
        'thumbnail',
        //'visibility',
        'category_id', 
        //'detail', 
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    } 
    public function options()
    {
        return $this->hasManyThrough(Option::class, Question::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function enrolls()
    {
        return $this->hasMany(Enroll::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class)->with("lessons");
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function whatinthecoures()
    {
        return $this->hasMany(whatinthecoure::class);
    }

    public function getImagePathAttribute()
    {
        return Storage::disk("cources")->url($this->thumbnail);
    }

    public function courceQuestions()
    {
        return $this->hasMany(Question::class)->with('questionOptions');
    }
}
