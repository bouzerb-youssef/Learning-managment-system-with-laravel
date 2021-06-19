<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;
use App\Models\Student;
use App\Models\Centre;
class StudentGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        "centre_id",
        'formation_id',
      
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
 
    public function students()
    {
        return $this->hasMany(User::class);
    }
}
