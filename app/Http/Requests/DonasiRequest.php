<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DonasiRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tanggal' => 'required|date',
            'donatur' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required|numeric',
            'penerima' => 'required',
            'bank_penerima' => 'required',
            'rekening_penerima' => 'required',
            'pengirim' => 'required',
            'bank_pengirim' => 'required',
            'rekening_pengirim' => 'required',
            'bukti_transfer' => 'image'
        ];
    }
}
