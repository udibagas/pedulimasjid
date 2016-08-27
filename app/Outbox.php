<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    public $fillable = ['inbox_id', 'body'];

    public function inbox()
    {
        return $this->belongsTo('App\Inbox');
    }
}
