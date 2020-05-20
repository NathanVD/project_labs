<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the articles for the category.
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
