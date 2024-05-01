<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeopleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['admin']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'prename' => 'sometimes|string|max:255',
            'name' => 'required|string|max:255|unique:people',
            'postname' => 'sometimes|string|max:255',
            'sinta' => 'sometimes|string|max:255',
            's1' => 'sometimes|string|max:255',
            's2' => 'sometimes|string|max:255',
            's3' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|max:255',
            'jabatan' => 'sometimes|string|max:255',
            'fungsional' => 'sometimes|string|max:255',
            'project' => 'sometimes',
            'publication' => 'sometimes',
            'hki' => 'sometimes',
            'foto' => 'sometimes|image|mimes:png,jpg,jpeg',
            'status' => 'required|integer'
        ];
    }
}
