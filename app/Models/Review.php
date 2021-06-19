<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cource;
class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cource_id',
        'rating',
        'review',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cource()
    {
        return $this->belongsTo(Cource::class);
    }
   
}
