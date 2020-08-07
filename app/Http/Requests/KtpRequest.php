<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KtpRequest extends FormRequest
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
            
            'nama' => 'required|min:3|max:20',
            'alamat' => 'required',
            'no_kk' => 'required|size:6',
            'foto' => 'file|image|max:1024',
            'jenis_kelamin' => 'required|in:P,L',
            'status' => 'required',
            'pendidikan' => 'required'
        ];
    }
}
