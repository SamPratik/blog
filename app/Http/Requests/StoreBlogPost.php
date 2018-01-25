<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:191|unique:posts,slug',
            'category_id' => 'required',
            'body' => 'required',
            'featured_image' => 'sometimes|image'
        ];
    }

    public function messages() {
      return [
        'title.required' => 'The Title field is required',
        'body.required' => 'Body Filed is required',
        'title.max' => 'Title field can hold maximum 255 characters'
      ];
    }
}
