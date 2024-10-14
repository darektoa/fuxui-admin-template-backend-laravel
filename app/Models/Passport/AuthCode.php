<?php

namespace App\Models\Passport;

use App\Traits\Model\CamelCaseAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\AuthCode as PassportAuthCode;

class AuthCode extends PassportAuthCode
{
    use CamelCaseAttributes, HasFactory;
}
