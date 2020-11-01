<?php


namespace App\Http\FormRequests\User;


use App\Http\FormRequests\IRFormRequest;

class UserLoginRequest extends IRFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|exists:users,name',
            'password' => 'required'
        ];
    }
}
