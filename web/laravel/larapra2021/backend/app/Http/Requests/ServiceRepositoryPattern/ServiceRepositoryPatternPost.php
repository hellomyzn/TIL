<?php

namespace App\Http\Requests\ServiceRepositoryPattern;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRepositoryPatternPost extends FormRequest
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
            'title' => 'required',
            'description' => 'required'
        ];
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function messages(){
        return [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
        ];
    }
}
