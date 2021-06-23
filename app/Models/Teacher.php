<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\Centre;
use Illuminate\Support\Facades\Storage;
class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name',
        'phone',
        'address',
        'nots',
        'sex',
        "photo",
        "center_id",
        "group_id",
    ];

    public function group()
    {
        return $this->belongsTo(Group::class)->with('formation');
    }

    public function center()
    {
        return $this->belongsTo(Centre::class);
    }
    public function getImagePathAttribute()
    {
        return Storage::disk('teacher')->url($this->photo);
    }
}
