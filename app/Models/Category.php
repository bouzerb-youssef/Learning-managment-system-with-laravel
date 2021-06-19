<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cource;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        
    ];

    public function cources()
    {
        return $this->hasMany(Cource::class)->with("sections","options");
    }
}
