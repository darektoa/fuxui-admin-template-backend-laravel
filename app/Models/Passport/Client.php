<?php

namespace App\Models\Passport;

use App\Traits\Model\CamelCaseAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Client as PassportClient;

class Client extends PassportClient
{
    use CamelCaseAttributes, HasFactory;

    /**
     * Determine if the client should skip the authorization prompt.
     */
    public function skipsAuthorization(): bool
    {
        return $this->firstParty();
    }
}
