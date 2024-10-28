<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DirectoryResource extends JsonResource
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
            "directoryId"   => $this->directoryId,
            "menuId"        => $this->menuId,
            "name"          => $this->name,
            "codename"      => $this->codename,
            "depth"         => $this->depth,
            "order"         => $this->order,
            "createdAt"     => $this->createdAt,
            "updatedAt"     => $this->updatedAt,
            "deletedAt"     => $this->deletedAt,
            "contents"      => ContentResource::collection($this->whenLoaded('contents')),
            "directories"   => DirectoryResource::collection($this->whenLoaded('directories')),
        ];
    }
}
