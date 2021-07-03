<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'cource_id',
        'name',
        'duration',
        'video',
        'view',
        'file_prossesed',
        'thumbnail_image',
    ];
    public function cource()
    {
        return $this->belongsTo(Cource::class);
    } 
    public function getVideoPathAttribute()
    {
        return Storage::disk("lessons")->url($this->video);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
