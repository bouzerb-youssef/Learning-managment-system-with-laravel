<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Centre;
use App\Models\Message;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',    
        'formation_id',
        'centre_id',
      
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function students()
    {
        return $this->hasMany(User::class);
    }
    public function centre()
    {
        return $this->belongsTo(Centre::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
