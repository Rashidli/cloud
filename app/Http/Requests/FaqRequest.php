<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'az_title' => 'required',
            'az_content' => 'required',
            'en_title' => 'required',
            'en_content' => 'required',
            'ru_title' => 'required',
            'ru_content' => 'required',
        ];
    }
}
