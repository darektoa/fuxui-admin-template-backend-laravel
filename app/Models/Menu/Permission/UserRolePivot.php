<?php

namespace App\Models\Menu\Permission;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRolePivot extends Pivot
{
    use SoftDeletes;

    protected $table = 'menu_permission_user_role_pivot';

    public $timestamps = true;
}
