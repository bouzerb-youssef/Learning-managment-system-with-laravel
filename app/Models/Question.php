<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Option;
use App\Models\Result;
use App\Models\Cource;
use Illuminate\Support\Facades\Storage;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'cource_id',
        'question',
        'audio',
    ];

    public function questionOptions()
    {
        return $this->hasMany(Option::class, 'question_id', 'id');
    }

    public function questionsResults()
    {
        return $this->belongsToMany(Result::class);
    }

    public function cource()
    {
        return $this->belongsTo(Cource::class, 'category_id');
    }
    public function getOudioPathAttribute()
    {
        return Storage::disk("questions")->url($this->audio);
    }
}
