<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use App\Models\Lesson;
use App\Models\Result;
use App\Models\Stage;
use App\Models\Group;
use App\Models\StudentAttachment;
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'phone',
        'sex',
        'cin',
        'familySituation',
        'childrenNmb',
        'educationLevel',
        'address',
        'nots',
        "group_id",
        "photo",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */

    protected $appends = [
        'profile_photo_url',
    ];
    public function group()
    {
        return $this->belongsTo(Group::class)->with('formation');
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function getImagePathAttribute()
    {
        return Storage::disk('student')->url($this->photo);
    }

    public function enrolls()
    {
        return $this->hasMany(Enroll::class)->with("cource");
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
   
    public function userResults()
    {
        return $this->hasMany(Result::class, 'user_id', 'id');
    }
    public function Stages()
    {
        return $this->hasMany(Stage::class);
    }
    public function studentAttachments()
    {
        return $this->hasMany(StudentAttachment::class);
    }
    
}
