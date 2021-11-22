<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->user;
        return [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation|alpha_num',
            'password_confirmation' => 'min:6'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Lengkap wajib diisi.',
            'name.min' => 'Isi Minimal 3 huruf.',
            'name.max' => 'Isi maksimal 50 huruf.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Inputan harus berformat email',
            'password.required' => 'Password Wajib Diisi',
            'password.alpha_num' => 'Password harus terdapat angka dan huruf',
            'password.string' => 'Password harus berupa angka dan huruf',
            'password.min' => 'Password minimal 6 karakter',
            'password.same' => 'Password tidak sama',
            'password.required_with' => 'Harap Isi Konfirmasi Password',
            'password_confirmation.min' => 'Konfirmasi Password minimal 6 karakter'
        ];
    }
}
