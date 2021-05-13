<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'sku' => $this->sku,
            'client' => [
                'display_name' => $this->client->user->name,
                'email' => $this->client->user->email,
                'document_type' => $this->client->document_type,
                'document' => $this->client->document,
            ],
        ];
    }
}
