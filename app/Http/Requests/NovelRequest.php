<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NovelRequest extends FormRequest
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
            'novel_title' => 'required|string|max:50',
            'novel_information' => 'nullable|string|max:1000',
            'episode' => 'required|string|max:20000',
            'subtitle' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'novel_title' => '必須です',
            'novel_information' => '1000文字以内にしてください',
            'episode' => '必須です',
            'subtitle' => '必須です',
        ];
    }
}
