<?php

namespace App\Http\Requests;

use App\Models\Progression;
use Illuminate\Foundation\Http\FormRequest;

class ProgressionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return Progression::rules();
    }

    public function messages()
    {
        return Progression::messages();
    }
}
