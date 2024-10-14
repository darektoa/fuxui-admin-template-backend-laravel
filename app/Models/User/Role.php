<?php

namespace App\Models\User;

use App\Models\Menu\Permission\Permission;
use App\Models\Menu\Permission\UserRolePivot;
use App\Traits\Model\CamelCaseAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use CamelCaseAttributes, HasFactory, HasUlids, SoftDeletes;

    protected $table = 'user_roles';

    protected $guarded = [
        'id'
    ];


    /**
     * Get the users of the user role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() :BelongsToMany
    {
        return $this->belongsToMany(
                related: User::class,
                table: 'user_role_pivot',
                foreignPivotKey: 'role_id',
                relatedPivotKey: 'user_id'
            )
            ->using(RolePivot::class)
            ->withTimestamps();
    }


    /**
     * Get menu permissions of the user role
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
                related: Permission::class,
                table: 'menu_permission_user_role_pivot',
                foreignPivotKey: 'user_role_id',
                relatedPivotKey: 'menu_permission_id'
            )
            ->using(UserRolePivot::class)
            ->withTimestamps();
    }
}
