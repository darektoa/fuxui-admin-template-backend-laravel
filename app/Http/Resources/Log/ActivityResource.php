<?php

namespace App\Http\Resources\Log;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
            "url"               => $this->whenHas('url'),
            "ip"                => $this->whenHas('ip'),
            "userAgent"         => $this->whenHas('user_agent'),
            "device"            => $this->whenHas('device'),
            "device"            => $this->whenHas('device'),
            "platform"          => $this->whenHas('platform'),
            "browser"           => $this->whenHas('browser'),
            "is_desktop"        => $this->whenHas('is_desktop'),
            "is_phone"          => $this->whenHas('is_phone'),
            "robot"             => $this->whenHas('robot'),
            "parameters"        => $this->whenHas('parameters'),
            "headers"           => $this->whenHas('headers'),
            "createdAt"         => $this->created_at,
            "accessToken"       => $this->whenLoaded('accessToken'),
            "client"            => $this->whenLoaded('client'),
            "user"              => $this->whenLoaded('user'),
        ];
    }
}
