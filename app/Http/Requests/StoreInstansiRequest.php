<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstansiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Otorisasi ditangani middleware, jadi true
    }

    public function rules(): array
    {
        return [
            'nama_instansi' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'kota' => 'nullable|string|max:50',
            'provinsi' => 'nullable|string|max:50',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'bidang_usaha' => 'nullable|string|max:100',
            'status_aktif' => 'required|boolean',
        ];
    }
}