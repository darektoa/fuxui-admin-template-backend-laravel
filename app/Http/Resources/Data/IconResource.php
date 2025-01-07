<?php

namespace App\Http\Resources\Data;

use App\Helpers\StorageHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IconResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"                => $this->id,
            "name"              => $this->whenHas('name'),
            "uri"               => $this->whenHas('uri', StorageHelper::url($this->uri)),
            "createdAt"         => $this->whenHas('created_at'),
            "updatedAt"         => $this->whenHas('updated_at'),
            "deletedAt"         => $this->whenHas('deleted_at'),
        ];
    }
}
