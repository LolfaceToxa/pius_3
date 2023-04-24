<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Recources\GoodRecource;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
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
            'user' => $this->user,
            'goods' => GoodResource::collection($this->goods),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
