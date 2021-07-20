<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
				'task_title' => [
					'required',
					'max:50',
					Rule::unique('tasks')->ignore($this->task)
				],
				'text_body' => 'required|max:200',
                'completed' => 'sometimes|required'
			];
    }
}
