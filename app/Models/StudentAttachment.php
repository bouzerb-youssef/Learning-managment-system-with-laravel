<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class StudentAttachment extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'genre',
        'file',
        'user_id' 
    ];
    
    public function student()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
    
}
