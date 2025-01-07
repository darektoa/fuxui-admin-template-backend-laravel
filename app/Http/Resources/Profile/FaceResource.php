<?php

namespace App\Http\Resources\Profile;

use App\Helpers\StorageHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaceResource extends JsonResource
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
            "name"          => $this->name,
            "imageUri"      => $this->when($this->imageUri, StorageHelper::url($this->imageUri), null),
            "isActive"      => $this->isActive,
            "createdAt"    => $this->createdAt,
            "updatedAt"    => $this->updatedAt,
            "deletedAt"    => $this->whenNotNull($this->deletedAt),
        ];
    }
}
