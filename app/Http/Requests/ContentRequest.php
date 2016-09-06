<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContentRequest extends Request
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
            "title" => 'required|max:150',
            "categories_id" => 'required|integer',
            "description" => 'required|min:5',
            "img" => 'image|max:500',
            "url" => 'alpha_dash|unique:Contents'
        ];
    }
}
