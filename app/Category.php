<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $with = [
    //     'posts'
    // ];
    
    //posts - categories
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
