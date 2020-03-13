<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required',
            'about'=>'required|string|min:12|max:64',
            // 'current-password' => 'required',
            // 'new_password' => ['required'],
            // 'password_confirm' => ['same:new_password'],
        ];
    }
}
