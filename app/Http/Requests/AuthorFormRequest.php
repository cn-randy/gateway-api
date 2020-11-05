<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class AuthorFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules()
    {
        $required = in_array($_SERVER['REQUEST_METHOD'], ['PUT', 'PATCH']) ? '' : 'required|';

        return [
            'name' => "{$required}max:255",
            'gender' => "{$required}in:male,female",
            'country' => "{$required}max:255"
        ];
    }
}
