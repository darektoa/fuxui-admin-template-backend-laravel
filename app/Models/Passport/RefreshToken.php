<?php

namespace App\Models\Passport;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\RefreshToken as PassportRefreshToken;

class RefreshToken extends PassportRefreshToken
{
    use HasFactory;
}
