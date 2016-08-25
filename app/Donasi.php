<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    public $fillable = ['tanggal', 'donatur', 'jumlah', 'jenis'];
}
