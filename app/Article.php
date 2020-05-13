<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Get the author of the article.
     */
    public function author()
    {
        return $this->belongsTo('App\Author');
    }
    /**
     * Get the category of the article.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    /**
     * The tags that belong to the article.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    /**
     * Get the comments for the article.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
