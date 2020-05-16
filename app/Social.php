<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /**
     * Get the project that owns the social link.
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
