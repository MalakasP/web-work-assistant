<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'date_till_done' => ['required', 'date', 'after_or_equal:today'],
            'status_id' => ['required', 'integer', 'numeric'],
            'priority_id' => ['required', 'integer', 'numeric'],
            'reporter_id' => ['required', 'integer', 'numeric'],
            'assignee_id' => ['required', 'integer', 'numeric']
        ];
    }
}
