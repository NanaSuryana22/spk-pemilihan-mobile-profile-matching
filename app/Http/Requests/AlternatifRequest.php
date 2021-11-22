<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlternatifRequest extends FormRequest
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
        $id = $this->alternatif;
        return [
            'nama' => 'required|min:3|max:50',
            'image' => 'min:3|max:7000|image|file',
            'desc' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Kolom wajib diisi.',
            'nama.min' => 'Isi minimal 3 karakter.',
            'nama.max' => 'Isi maksimal 50 karakter',
            'image.min' => 'Ukuran Gambar Minimal 3 Kilobytes',
            'image.max' => 'Ukuran Gambar Maksimal 7 Megabytes',
            'image.image' => 'File yang diupload harus berupa gambar',
            'desc.required' => 'Deskripsi wajib diisi.',
            'desc.min' => 'Isi minimal 3 karakter.'
        ];
    }
}
