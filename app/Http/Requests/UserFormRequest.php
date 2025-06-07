<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
     public function rules()
    {
        return [
            'id' => 'required|integer|max:50|unique:users,id',
            'name' => 'required|string|max:100',
            'password' => 'required|string|min:4',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => '아이디는 필수 항목입니다.',
            'id.unique' => '이미 사용 중인 아이디입니다.',
            'name.required' => '이름은 필수 항목입니다.',
            'password.required' => '비밀번호는 필수 항목입니다.',
            'password.min' => '비밀번호는 최소 4자 이상이어야 합니다.',
        ];
    }
}
