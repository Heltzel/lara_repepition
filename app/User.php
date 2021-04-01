<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // vid 45:  1 to 1
    public function phone(){
        return $this->hasOne(Phone::class);
    }
    // vid 46: 1:n
    public function posts(){
        return $this->hasMany(\App\Post::class);
    }
    //vid 47: n:n
    public function roles(){
       return $this->belongsToMany(Role::class)->withPivot(['name'])->withTimestamps();
    }
}
