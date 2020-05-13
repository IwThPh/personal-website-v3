<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * The projects that belong to the skill.
     */
    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }
}
