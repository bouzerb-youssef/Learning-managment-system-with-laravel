<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Year;
use App\Models\StudentGroup;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'datebegun',
        'dateend',
        'year_id',
      
    ];

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function studentgroups()
    {
        return $this->hasMany(StudentGroup::class);
    }
    
}
