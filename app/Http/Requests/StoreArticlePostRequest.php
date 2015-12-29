<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreArticlePostRequest extends Request
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
            'title' =>  'required|max:300|min:4',
            'slug'  =>  'required',
            'content'   =>  'required|min:5',
            'image' =>  'image'
        ];
    }

    /**
     * Get messages if validation not valid.
     *
     * @return array
     */

    public function messages()
    {

        return [
            'title.required' => 'Vui lòng nhập Tiêu đề',
            'content.required' => 'Vui lòng nhập Nội dung'
        ];

    }


}
