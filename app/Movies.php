<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $fillable =[ 'title', 'category_id', 'year', 'description', 'photo'];
    
    public function moviesCategories()
    {
        return $this->belongsTo(\App\MoviesCategories::class, 'category_id');
    }
}
