<?php

namespace App\Http\Requests\V1\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'roleId'       => 'required|max:26|exists:user_roles,id',
            'email'         => 'required|max:255|email|unique:users',
            'username'      => 'required|max:20|unique:users',
            'firstname'     => 'required|max:32',
            'lastname'      => 'max:32',
            'birthDate'    => 'required|date',
            'birthPlace'   => 'required|max:100',
            'phoneNumber'  => 'required|max:20',
        ];
    }
}
