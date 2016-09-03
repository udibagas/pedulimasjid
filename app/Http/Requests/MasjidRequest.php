<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MasjidRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            // 'pulau_id' => 'required',
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            // 'kecamatan_id' => 'required',
            // 'kelurahan_id' => 'required',
            'alamat' => 'required',
            // 'kode_pos' => 'required',
            'lat' => 'numeric',
            'long' => 'numeric',
            'img' => 'image',
            'kegiatan' => 'required',
            'kebutuhan' => 'required',
            'kondisi' => 'required',
            'approved' => 'required',
        ];
    }
}
