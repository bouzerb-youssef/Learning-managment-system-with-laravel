<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cource;

class Podcast extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'cource_id',
        'name',
        'podcast',
        
    ];

  
    public function cource()
    {
        return $this->belongsTo(Cource::class);
    }
}
