<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tokoBajuRequest extends FormRequest
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
            'nama_toko' => 'required|min:3|max:20',
            'alamat_toko' => 'required',
            'merk_baju' => 'required',
            'pengelola' => 'required',
            'foto' => 'file|image|max:1024',
            'harga' => 'required',
            'warna' => 'required'
        ];
    }
}
