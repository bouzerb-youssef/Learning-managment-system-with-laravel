<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whatinthecoure extends Model
{
    use HasFactory;
    protected $fillable  = [
        'detail',
        'cource_id',
    ];
}
