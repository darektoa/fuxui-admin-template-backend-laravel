<?php

namespace App\Models\Menu\Permission;

use App\Traits\Model\CamelCaseAttributes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRolePivot extends Pivot
{
    use CamelCaseAttributes, SoftDeletes;

    protected $table = 'menu_permission_user_role_pivot';

    public $timestamps = true;
}
