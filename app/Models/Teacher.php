<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        "centre_id",
        "group_id",
    ];
}
