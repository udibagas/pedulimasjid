<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    public $table = 'lokasi';

    public function scopePropinsi($query)
    {
        return $query->where('kota', '00')
                ->where('kecamatan', '00')
                ->where('kelurahan', '0000');
    }

    public function scopeKota($query)
    {
        return $query->where('kota', '!=', '00')
                ->where('kecamatan', '00')
                ->where('kelurahan', '0000');
    }

    public function scopeKecamatan($query)
    {
        return $query->where('kota', '!=', '00')
                ->where('kecamatan', '!=', '00')
                ->where('kelurahan', '0000');
    }

    public function scopeKelurahan($query)
    {
        return $query->where('kota', '!=', '00')
                ->where('kecamatan', '!=', '00')
                ->where('kelurahan', '!=', '0000');
    }
}
