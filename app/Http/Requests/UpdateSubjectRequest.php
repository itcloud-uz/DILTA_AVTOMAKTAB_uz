<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $subjectId = $this->route('subject');
        $subjectId = is_object($subjectId) ? $subjectId->id : $subjectId;

        return [
            'name' => 'required|string|unique:subjects,name,' . $subjectId . '|max:100',
        ];
    }
}
