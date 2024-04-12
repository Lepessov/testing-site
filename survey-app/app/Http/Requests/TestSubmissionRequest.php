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
        if (!Cache::has('total_questions')) {
            $totalQuestions = Question::count();
            Cache::put('total_questions', $totalQuestions, 1440);
        }

        $totalQuestions = Cache::get('total_questions');

        return [
            'email' => 'required|email',
            'responses' => 'required|array|size:' . $totalQuestions,
            'responses.*.question_id' => 'required|integer',
            'responses.*.option_id' => 'nullable|integer',
            'responses.*.user_input' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',

            'responses.required' => 'The responses field is required.',
            'responses.array' => 'The responses must be an array.',
            'responses.size' => 'Please provide answers to all questions.',

            'responses.*.question_id.required' => 'Each response must have a question ID.',
            'responses.*.question_id.integer' => 'The question ID in each response must be an integer.',

            'responses.*.option_id.integer' => 'The option ID in each response must be an integer.',

            'responses.*.user_input.string' => 'The user input in each response must be a string.',
        ];
    }
}
