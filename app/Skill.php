<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * The attributes that should be fillable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The projects that belong to the skill.
     */
    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }
}
