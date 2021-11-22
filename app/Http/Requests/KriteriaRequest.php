<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KriteriaRequest extends FormRequest
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
        $id = $this->kriteria;
        return [
            'nama' => 'required|min:3',
            'jenis_kriteria_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama wajib diisi.',
            'jenis_kriteria_id.required' => 'Jenis Kriteria Wajib Dipilih.',
            'nama.min' => 'Isi minimal 3 karakter.'
        ];
    }
}
