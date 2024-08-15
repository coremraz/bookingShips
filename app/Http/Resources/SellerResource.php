<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'seller',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'number' => $this->number,
                'date_birth' => $this->date_birth,
                'created_at' => $this->created_at,
            ],
        ];
    }
}
