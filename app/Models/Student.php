<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\Studentattachment;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name',
        'age',
        'phone',
        'sex',
        'cin',
        'familySituation',
        'childrenNmb',
        'educationLevel',
        'address',
        'nots',
        'nots',
        "group_id",
        "photo",
        
        
    ];

    public function studentgroup()
    {
        return $this->belongsTo(Group::class);
    }
    
    public function documents()
    {
        return $this->hasMany(Document::class);
    } 
    
    public function getImagePathAttribute()
    {
        return Storage::disk("student")->url($this->photo);
    }
    public function students()
    {
        return $this->hasMany(Studentattachment::class);
    }

}
