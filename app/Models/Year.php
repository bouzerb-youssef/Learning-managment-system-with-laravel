<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;
class Year extends Model
{
    use HasFactory;

    protected $fillable = [
        'year', 
    ];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
    

}
