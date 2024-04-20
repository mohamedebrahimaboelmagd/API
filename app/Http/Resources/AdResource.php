<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->text,
            'phone' => $this->phone,
            'relation with domain' => [
                'domain_id' => $this->domain->id,
                'domain_name' => $this->domain->name,
                'domain_status' => $this->domain->status,
            ],
            'relation with user' => [
                'user_id' => $this->user->id,
                'user_name' => $this->user->name,
                'user_email' => $this->user->email,
            ],
        ];
    }
}
