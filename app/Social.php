<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /**
     * The attributes that should be fillable.
     *
     * @var array
     */
    protected $fillable = ['name', 'ref', 'fa'];

    /**
     * Get the project that owns the social link.
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
