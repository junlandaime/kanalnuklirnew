<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['admin', 'teacher']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'excerpt' => 'required|string',
            'body' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'status' => 'required',
            'published_at' => 'required',
            'category_id' => 'required|integer',
            // 'user_id' => 'required|integer'
        ];
    }
}
