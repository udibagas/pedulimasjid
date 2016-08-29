<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    public $fillable = [
        'nama', 'pulau_id', 'provinsi_id', 'kota_id', 'kecamatan_id',
        'kelurahan_id', 'alamat', 'kontak_nama', 'kontak_telp',
        'lat', 'long', 'kode_pos', 'kegiatan', 'kebutuhan', 'img'
    ];

    public function pulau()
    {
        return $this->belongsTo('App\Lokasi');
    }

    public function provinsi()
    {
        return $this->belongsTo('App\Lokasi', 'provinsi_id', 'id');
    }

    public function kota()
    {
        return $this->belongsTo('App\Lokasi', 'kota_id', 'id');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Lokasi', 'kecamatan_id', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo('App\Lokasi', 'kelurahan_id', 'id');
    }
}
