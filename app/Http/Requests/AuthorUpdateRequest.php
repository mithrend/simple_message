<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AuthorUpdateRequest
 * @package App\Http\Requests
 */
class AuthorUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'string',
            'last_name' => 'string'
        ];
    }
}
