<?php

namespace App\Http\Resources\User;

use App\Helpers\StorageHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfilePictureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"            => $this->id,
            "uri"           => $this->when($this->uri, StorageHelper::url($this->uri), null),
            "alt"           => $this->alt,
            "is_active"     => $this->is_active,
            "created_at"    => $this->created_at,
            "updated_at"    => $this->updated_at,
            "deleted_at"    => $this->whenNotNull($this->deleted_at),
        ];
    }
}
