<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateLogbookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Otorisasi ditangani middleware dan controller
    }

    public function rules(): array
    {
        return [
            'action' => 'required|in:approve,reject',
            'catatan_revisi' => 'required_if:action,reject|nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'catatan_revisi.required_if' => 'Catatan revisi wajib diisi jika meminta perbaikan.',
        ];
    }
}