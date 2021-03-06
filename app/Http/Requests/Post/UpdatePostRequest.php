<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|unique:posts,title,' . $this->post->id,
            'description' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif|nullable|max:1999',
            'category_id'=>'required'
        ];
    }
}
