<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'year' => 'required',
            'category_id' => 'required|numeric'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The Name field is required!',
            'name.min' => 'The Name field must contain at least 2 characters!',
            'name.max' => 'The Name field must contain a maximum of 255 characters!',
            'year.required' => 'The Year field is required!',
            'category_id.required' => 'The genre field must be selected!',
            'category_id.numeric' => 'The genre field must be numeric!'
        ];
    }
}
