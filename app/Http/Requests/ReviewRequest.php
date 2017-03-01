<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'reviewer_name' => 'required|string',
            'title' => 'required|string|max:45',
            'content' => 'required|string|max:5000',
            'date' => 'required|date',
            'product_id' => 'required|numeric|min:0',
        ];
    }
}
