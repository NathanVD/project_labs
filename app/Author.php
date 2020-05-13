<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * Get the articles written by this author.
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
