<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    public $fillable = [
        'nama', 'pulau_id', 'provinsi_id', 'kota_id', 'kecamatan_id',
        'kelurahan_id', 'alamat', 'kontak_nama', 'kontak_telp',
        'lat', 'long', 'kode_pos'
    ];

    public function pulau()
    {
        return $this->belongsTo('App\Pulau');
    }

    public function provinsi()
    {
        return $this->belongsTo('App\Provinsi');
    }

    public function kota()
    {
        return $this->belongsTo('App\Kota');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Kecamatan');
    }

    public function kelurahan()
    {
        return $this->belongsTo('App\Kelurahan');
    }
}
