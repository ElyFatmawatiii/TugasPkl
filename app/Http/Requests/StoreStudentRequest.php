<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'class'   => 'required',
            'address' => 'required',
            'gender'  => 'required|in:male,female',
            'status'  => 'required|in:active,inactive',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'class.required' => 'Kelas wajib diisi.',
            'address.required' => 'Alamat wajib diisi.',
            'gender.required' => 'Jenis kelamin wajib diisi.',
            'status.required' => 'Status wajib diisi.',
            'image.required' => 'Gambar wajib diisi.',
            'image.mimes' => 'Format gambar harus berupa JPEG, PNG, JPG, atau GIF.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
