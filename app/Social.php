<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    //TODO: Return all global socials, if no associated project.

    /**
     * Get the project that owns the social link.
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    /**
     * Get the image for the social.
     */
    public function image()
    {
        return $this->morphToMany('App\Image', 'imageable');
    }
}
