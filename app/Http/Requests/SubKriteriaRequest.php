<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubKriteriaRequest extends FormRequest
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
        $id = $this->sub_kriteria;
        return [
            'nama' => 'required|min:3',
            'kriteria_id' => 'required',
            'nilai' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama Sub Kriteria Wajib Diisi.',
            'nama.min' => 'Isi minimal 3 karakter.',
            'kriteria_id.required' => 'Kriteria Wajib Dipilih.',
            'nila.required' => 'Nilai wajib diisi.',
            'nilai.numeric' => 'Inputan nilai harus berupa angka.'
        ];
    }
}
