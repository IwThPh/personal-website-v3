<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Get all of the projects that are assigned this tag.
     */
    public function projects()
    {
        return $this->morphedByMany('App\Project', 'imageable');
    }
}
