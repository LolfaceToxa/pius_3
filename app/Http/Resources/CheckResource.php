<?php

namespace App\Http\Resources;

use App\Http\Recources\CardRecource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            'id' => $this->id,
            'email' => $this->email,
            'cards' => CardResource::collection($this->cards),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
