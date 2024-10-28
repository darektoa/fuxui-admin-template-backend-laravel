<?php

namespace App\Http\Resources\Content;

use App\Helpers\StorageHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dump($this->typeId);
        $isURLValue = collect([
            4, 5, 6
        ])->search($this->typeId);

        return [
            "id"                => $this->id,
            "directoryId"       => $this->directoryId,
            "typeId"            => $this->typeId,
            "usingContentId"    => $this->usingContentId,
            "name"              => $this->name,
            "codename"          => $this->codename,
            "value"             => $this->when($isURLValue, StorageHelper::url($this->value), $this->value),
            "json"              => $this->json,
            "order"             => $this->order,
            "createdAt"         => $this->createdAt,
            "updatedAt"         => $this->updatedAt,
            "deletedAt"         => $this->whenNotNull('deletedAt'),
            "type"              => TypeResource::make($this->whenLoaded('type')),
        ];
    }
}
