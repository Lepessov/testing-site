<?php

namespace App\Http\Requests;

use App\Models\Question;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Cache;

class TestSubmissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|integer',
            'responses.*.option_id' => 'nullable|integer',
            'responses.*.user_input' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Поле электронной почты обязательно для заполнения.',
            'email.email' => 'Пожалуйста, введите действительный адрес электронной почты.',
            'responses.required' => 'Поле ответов обязательно для заполнения.',
            'responses.array' => 'Ответы должны быть представлены в виде массива.',
            'responses.*.question_id.required' => 'Каждый ответ должен содержать идентификатор вопроса.',
            'responses.*.question_id.integer' => 'Идентификатор вопроса в каждом ответе должен быть целым числом.',
            'responses.*.option_id.integer' => 'Идентификатор варианта ответа в каждом ответе должен быть целым числом.',
            'responses.*.user_input.string' => 'Введенный пользовательский текст в каждом ответе должен быть строкой.',
        ];
    }
}
