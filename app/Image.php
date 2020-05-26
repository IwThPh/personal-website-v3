<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
     /**
     * The attributes that should be fillable.
     *
     * @var array
     */
    protected $fillable = ['filename', 'name', 'width', 'height'];

    /**
     * Get all of the projects that are assigned this tag.
     */
    public function projects()
    {
        return $this->morphedByMany('App\Project', 'imageable');
    }
}
