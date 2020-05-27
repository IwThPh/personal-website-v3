<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    /**
     * The attributes that should be fillable.
     *
     * @var array
     */
    protected $fillable = ['name', 'location', 'desc', 'start_at', 'end_at'];
}
