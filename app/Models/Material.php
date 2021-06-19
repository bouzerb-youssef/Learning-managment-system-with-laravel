<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'cource_id',
        'materialname',
        'material',
        
    ];

    public function getPdfPathAttribute()
    {
        return Storage::disk("materials")->url($this->material);
    }

}
