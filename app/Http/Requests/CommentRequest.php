<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommentRequest extends Request
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
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'content' => 'required',
            'star' => 'in:1,2,3,4,5',
            'commentable_id' => 'required',
            'commentable_type' => 'required',
        ];
    }
}
