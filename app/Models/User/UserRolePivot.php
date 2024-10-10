<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRolePivot extends Pivot
{
    use SoftDeletes;

    public $timestamps = true;
}
