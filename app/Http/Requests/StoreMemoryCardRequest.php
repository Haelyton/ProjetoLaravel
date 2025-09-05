<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemoryCardRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'marca' => ['required', 'string', 'max:100'],
            'tipo' => ['required', 'in:SD,MicroSD,CFexpress,CF,MemoryStick'],
            'capacidade' => ['required', 'integer', 'min:1', 'max:2048'],
            'preco' => ['required', 'numeric', 'min:0'],
        ];
    }
}
