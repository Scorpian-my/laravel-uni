<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'title' => $this->title,
            'origin' => $this->origin,
            'destination' => $this->destination,
            'departure_at' => $this->departure_at,
            'arrival_at' => $this->arrival_at,
            'flight_number' => $this->flight_number,
            'price' => $this->price,
            'stock' => $this->stock,
            'image' => $this->image,
            'description' => $this->description,
            'is_done' => $this->is_done,
            'category_id' => $this->category_id,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
