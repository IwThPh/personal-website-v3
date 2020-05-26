<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['skills', 'socials', 'images'];

    /**
     * The attributes that should be fillable.
     *
     * @var array
     */
    protected $fillable = ['name', 'rank', 'brief', 'desc'];

    /**
     * The attributes that should be cast before persisting.
     *
     * @var array
     */
    protected $casts = ['rank' => 'int'];

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
