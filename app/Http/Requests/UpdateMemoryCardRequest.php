<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemoryCardRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'marca' => ['sometimes', 'string', 'max:100'],
            'tipo' => ['sometimes', 'in:SD,MicroSD,CFexpress,CF,MemoryStick'],
            'capacidade' => ['sometimes', 'integer', 'min:1', 'max:2048'],
            'preco' => ['sometimes', 'numeric', 'min:0'],
        ];
    }
}
