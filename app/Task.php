<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    // fais les liens entre les tables

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
