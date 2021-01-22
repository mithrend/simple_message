<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AuthorWithMessageResource
 * @package App\Http\Resources
 */
class AuthorWithMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'created_at' => $this->created_at->format('H:i:s d/m/Y'),
            'updated_at' => $this->updated_at->format('H:i:s d/m/Y'),
            'messages' => MessageResource::collection($this->messages),
        ];
    }
}
