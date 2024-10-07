<?php

namespace App\Models\Passport;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Token as PassportToken;

class Token extends PassportToken
{
    use HasFactory;
}
