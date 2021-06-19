<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Stage extends Model
{
    use HasFactory;
   
    protected $fillable = [
        
        'user_id',
        'title',
        'description',
        'address',
        'genre',
        
    ];
    public function user()
    {

        return $this->belongsTo(User::class);

    }
}
