<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdate extends FormRequest
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
            /*'slug' => [
                'required',
                'alpha_dash',
                'min:5',
                'max:191',
                Rule::unique('posts')->ignore($post->id),
            ],*/
            'body' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'title.max' => 'Title can have maximum 255 characters.',
            'body.required' => 'Body is required.'
        ];
    }
}
