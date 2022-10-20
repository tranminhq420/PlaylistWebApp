<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function Continent()
    {
        return $this->belongsTo(Continent::class);
    }
}