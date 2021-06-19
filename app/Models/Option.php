<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use Illuminate\Support\Facades\Storage;

class Option extends Model
{
    use HasFactory;
    protected $fillable = [
        'points',
        'created_at',
        'updated_at',
        'deleted_at',
        'question_id',
        'option',
        'image',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
    public function getImagePathAttribute()
    {
        return Storage::disk("options")->url($this->image);
    }
}
