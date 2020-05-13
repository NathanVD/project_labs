<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Get the author of the article.
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
