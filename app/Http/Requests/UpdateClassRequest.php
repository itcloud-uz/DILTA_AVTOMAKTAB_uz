<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $classId = $this->route('school_class') ?? $this->route('class');
        $classId = is_object($classId) ? $classId->id : $classId;

        return [
            'name' => 'required|string|unique:school_classes,name,' . $classId . '|max:50',
        ];
    }
}
