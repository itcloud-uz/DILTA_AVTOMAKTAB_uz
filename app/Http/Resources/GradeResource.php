<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GradeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'subject_id' => $this->subject_id,
            'teacher_id' => $this->teacher_id,
            'score' => $this->score,
            'date' => $this->date,
            'student' => new StudentResource($this->whenLoaded('student')),
            'subject' => new SubjectResource($this->whenLoaded('subject')),
            'teacher' => new UserResource($this->whenLoaded('teacher')),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
