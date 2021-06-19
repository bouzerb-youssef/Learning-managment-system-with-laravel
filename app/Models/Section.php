<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cource;
use App\Models\Lesson;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'cource_id',
        'section',
        'description',
       
        
    ];
    public function cource()
    {

        return $this->belongsTo(Cource::class);

    }

     public function lessons()
    {
        return $this->hasMany(Lesson::class);
    } 
    public function getPdfPathAttribute()
    {
        return Storage::disk("public")->url($this->material);
    }
    public function materials()
    {
        return $this->hasMany(Material::class);
    } 
}
