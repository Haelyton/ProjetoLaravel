<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCameraRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'marca' => ['sometimes', 'string', 'max:100'],
            'modelo' => ['sometimes', 'string', 'max:100'],
            'resolucao' => ['sometimes', 'string', 'max:50'],
            'preco' => ['sometimes', 'numeric', 'min:0'],
        ];
    }
}
