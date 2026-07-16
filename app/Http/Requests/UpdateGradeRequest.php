<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGradeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => 'sometimes|required|exists:students,id',
            'subject_id' => 'sometimes|required|exists:subjects,id',
            'teacher_id' => 'sometimes|required|exists:users,id',
            'score' => 'sometimes|required|integer|between:1,5',
            'date' => 'sometimes|required|date|before_or_equal:today',
        ];
    }
}
