<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $fillable = ['title', 'content', 'img', 'active'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
