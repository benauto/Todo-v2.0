<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    // fais les liens entre les tables

    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }


}
