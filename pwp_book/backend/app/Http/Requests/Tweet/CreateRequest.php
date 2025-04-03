<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'tweet' => 'required|max:140'
        ];
    }
        
    /**
     * userId
     *
     * @return int
     */
    public function userId(): int
    {
        return $this->user()->id;
    }

    /**
     * tweet
     *
     * @return string
     */
    public function tweet(): string
    {
        return $this->input('tweet');
    }
}
