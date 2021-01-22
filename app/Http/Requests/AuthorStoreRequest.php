<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AuthorStoreRequest
 * @package App\Http\Requests
 */
class AuthorStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string'
        ];
    }
}
