<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolePivot extends Pivot
{
    use SoftDeletes;

    protected $table = 'user_role_pivot';

    public $timestamps = true;
}
