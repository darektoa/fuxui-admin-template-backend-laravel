<?php

namespace App\Http\Resources\Menu;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            "name"              => $this->name,
            "codename"          => $this->codename,
            "icon_uri"          => $this->icon_uri,
            "is_external_uri"   => $this->is_external_uri,
            "description"       => $this->description,
            "tooltip"           => $this->tooltip,
            "depth"             => $this->depth,
            "order"             => $this->order,
            "created_at"        => $this->created_at,
            "updated_at"        => $this->updated_at,
            "deleted_at"        => $this->whenNotNull($this->deleted_at),
            "menu"              => MenuResource::make($this->whenLoaded('menu')),
            "menus"             => MenuResource::collection($this->whenLoaded('menus')),
        ];
    }
}
