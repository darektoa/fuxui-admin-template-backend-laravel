<?php

namespace App\Http\Requests\V1\Content;

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
        $contentId = $this->route('content');

        return [
            'directoryId'       => 'nullable|exists:content_directories,id',
            'typeId'            => 'nullable|exists:content_types,id',
            'usingContentId'    => 'nullable|exists:contents,id',
            'name'              => 'nullable|max:255',
            'codename'          => "nullable|max:32|unique:contents,codename,$contentId,id",
            'value'             => 'nullable|max:255',
            'json'              => 'nullable|json',
            'order'             => 'nullable|integer',
        ];
    }
}
