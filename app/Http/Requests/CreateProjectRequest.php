<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:191'],
            'description' => ['nullable', 'string', 'max:191'],
            'author_id' => ['required', 'integer', 'numeric'],
            'team_id' => ['nullable', 'integer', 'numeric'],
        ];
    }
}
