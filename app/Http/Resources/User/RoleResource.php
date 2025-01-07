<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Menu\Permission\PermissionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            "codename"      => $this->codename,
            "name"          => $this->name,
            "created_at"    => $this->created_at,
            "updated_at"    => $this->updated_at,
            "deleted_at"    => $this->whenNotNull($this->deleted_at),
            "permissions"   => PermissionResource::collection($this->whenLoaded('permissions')),
        ];
    }
}
