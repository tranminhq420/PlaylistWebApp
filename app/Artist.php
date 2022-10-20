<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Artist extends Model
{
    protected $fillable = ['name'];
    public function Link()
    {
        return $this->hasMany('App\Link');
    }
}