<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MessageUpdateRequest
 * @package App\Http\Requests
 */
class MessageUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'body' => 'required|string|max:255'
        ];
    }
}
