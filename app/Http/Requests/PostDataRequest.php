<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostDataRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'temperature' => ['nullable', 'numeric'],
            'voltage' => ['nullable', 'numeric'],
            'weight' => ['nullable', 'numeric'],
            'is_driving' => ['nullable', 'boolean'],
        ];
    }
}
