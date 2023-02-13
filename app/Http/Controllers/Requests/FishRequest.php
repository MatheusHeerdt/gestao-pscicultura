<?php

namespace App\Http\Controllers\Requests;

use App\Models\Fish;
use Illuminate\Foundation\Http\FormRequest;

class FishRequest extends FormRequest
{
    public function rules()
    {
        return Fish::rules();
   }
}
