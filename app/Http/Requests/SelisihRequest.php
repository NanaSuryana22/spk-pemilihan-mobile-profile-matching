<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SelisihRequest extends FormRequest
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
        $id = $this->selisih;
        return [
            'nilai' => 'required|numeric',
            'bobot' => 'required',
            'keterangan' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'nilai.required' => 'Nilai wajib diisi.',
            'bobot.required' => 'Bobot wajib diisi.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'keterangan.min' => 'Isi minimal 5 karakter.',
            'nilai.numeric' => 'Inputan nilai harus berupa angka'
        ];
    }
}
