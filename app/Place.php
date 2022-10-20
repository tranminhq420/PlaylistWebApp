<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function scopeIsVisited($query)
    {
        return $query->where('visited', '>', [0]);
    }
}