<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "id"                => $this->id,
            "email"             => $this->email,
            "emailVerifiedAt"   => $this->emailVerifiedAt,
            "username"          => $this->username,
            "firstname"         => $this->firstname,
            "lastname"          => $this->lastname,
            "birthDate"         => $this->birthDate,
            "birthPlace"        => $this->birthPlace,
            "phoneNumber"       => $this->phoneNumber,
            "createdAt"         => $this->createdAt,
            "updatedAt"         => $this->updatedAt,
            "deletedAt"         => $this->whenNotNull($this->deleted_at),
            "profilePictures"   => ProfilePictureResource::collection($this->whenLoaded('profilePictures')),
            "roles"             => RoleResource::collection($this->whenLoaded('roles')),
        ];
    }
}
