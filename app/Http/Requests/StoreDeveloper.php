<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeveloper extends FormRequest
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
            'language' => 'required|in:php,python,net',
            'name'=> 'required|min:2',
            'surname'=> 'required|min:2',
            'age'=> 'required|integer|min:18|max:50',
            'company_id'=>'required|exists:companies,id'
        ];
    }
}
