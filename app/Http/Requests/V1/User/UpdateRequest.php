<?php

namespace App\Http\Requests\V1\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user');

        return [
            'roleId'        => 'max:26|exists:user_roles,id',
            'email'         => "max:255|email|unique:users,email,$userId,id",
            'username'      => "max:20|unique:users,username,$userId,id",
            'firstname'     => 'max:32',
            'lastname'      => 'max:32',
            'birthDate'     => 'date',
            'birthPlace'    => 'max:100',
            'phoneNumber'   => 'max:20',
        ];
    }
}
