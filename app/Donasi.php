<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    public $fillable = [
        'tanggal', 'donatur', 'jumlah', 'jenis', 'alokasi',
        'keterangan', 'penerima', 'bank_penerima',
        'rekening_penerima', 'bank_pengirim', 'rekening_pengirim',
        'pengirim', 'bukti_transfer', 'confirmed'
    ];

    public static function getJenisList()
    {
        return [
            'sedekah' => 'Sedekah',
            'qurban' => 'Qurban',
            'zakat' => 'Zakat'
        ];
    }

    public function scopeOfJenis($query, $jenis)
    {
        return $query->where('jenis', $jenis);
    }

    public function scopeAlocated($query)
    {
        return $query->where('alokasi', '!=', '');
    }

    public function scopeUnAlocated($query)
    {
        return $query->where('alokasi', '');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('confirmed', 1);
    }

    public function scopeUnconfirmed($query)
    {
        return $query->where('confirmed', 0);
    }
}
