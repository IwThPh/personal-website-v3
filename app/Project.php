<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The skills that belong to the project.
     */
    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }

    /**
     * Get the social links associated with the project.
     */
    public function socials()
    {
        return $this->hasMany('App\Social');
    }

    /**
     * Get all of the images for the project.
     */
    public function images()
    {
        return $this->morphToMany('App\Image', 'imageable');
    }
}
