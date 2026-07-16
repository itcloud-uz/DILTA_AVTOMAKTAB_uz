<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'school_class_id' => 'required|exists:school_classes,id',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'status' => 'nullable|string|in:active,inactive',
        ];
    }
}
