<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Link extends Model
{
    // use Searchable;
    public function Artist()
    {
        return $this->belongsToMany('App\Artist');
    }
}