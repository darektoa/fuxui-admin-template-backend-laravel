<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserRolePivot extends Pivot
{
    use HasUlids;

    public $timestamps = true;
}
