<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    /**
     * The roles that belongs to the users.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * Get the articles written by this user.
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    /**
     * Verify if the user has a role
     */
    public function isAdmin() {
        return $this->roles()->where('name', 'Administrator')->exists();
    }
    public function isWebmaster() {
        return $this->roles()->where('name', 'Webmaster')->exists();
    }
    public function isEditor() {
        return $this->roles()->where('name', 'Editor')->exists();
    }
}
