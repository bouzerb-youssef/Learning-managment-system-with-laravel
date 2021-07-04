<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainship extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'title',
        'description',
        'begundate',
        'enddate',
        'company',
        "photo",
        "responsible",
        "necessaryskills",
        "user_id",
    ];
}
