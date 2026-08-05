<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyPengajuanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'action' => 'required|in:approve,reject',
            'catatan' => 'required_if:action,reject|nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'catatan.required_if' => 'Catatan alasan penolakan wajib diisi jika menolak pengajuan.',
        ];
    }
}