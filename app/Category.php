<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //posts - categories
    public function posts() {
        return $this->hasMany('App\Post');
    }
}