<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The users that have the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
