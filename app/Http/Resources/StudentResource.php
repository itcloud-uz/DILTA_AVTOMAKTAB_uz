<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'school_class_id' => $this->school_class_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'status' => $this->status,
            'school_class' => new SchoolClassResource($this->whenLoaded('schoolClass')),
            'grades' => GradeResource::collection($this->whenLoaded('grades')),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
