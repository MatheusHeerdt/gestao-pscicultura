<?php

namespace App\Http\Controllers\Requests;

use App\Models\Tank;
use Illuminate\Foundation\Http\FormRequest;

class TankRequest extends FormRequest
{
    public function rules()
    {
        return Tank::rules();
    }

    public function messages()
    {
        return [
            'name.required' => 'o campo nome é obrigatório',
            'name.string' => 'o campo nome deve ser um texto',
            'volume.required' => 'o campo volume é obrigatório',
            'volume.int' => 'o campo volume deve ser um número',
            'fish_id.required' => 'o campo peixe é obrigatório'
        ];
    }
}
