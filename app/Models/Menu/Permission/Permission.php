<?php

namespace App\Models\Menu\Permission;

use App\Models\Menu\Menu;
use App\Models\User\Role;
use App\Models\User\User;
use App\Traits\Model\CamelCaseAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use CamelCaseAttributes, HasFactory, HasUlids, SoftDeletes;

    protected $table = 'menu_permissions';

    /**
     * The attributes that are guarded from mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'pivot',
    ];

    /**
     * Get menu of the menu permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }


    /**
     * Get permission types of the menu permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types(): BelongsToMany
    {
        return $this->belongsToMany(
                related: Type::class,
                table: 'menu_permission_type_pivot',
                foreignPivotKey: 'menu_permission_id',
                relatedPivotKey: 'menu_permission_type_id',
            )
            ->wherePivotNull('deleted_at')
            ->using(MenuPermissionTypePivot::class)
            ->withTimestamps();
    }


    /**
     * Get roles of the menu permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
                related: Role::class,
                table: 'menu_permission_user_role_pivot',
                foreignPivotKey: 'menu_permission_id',
                relatedPivotKey: 'user_role_id',
            )
            ->using(UserRolePivot::class)
            ->withTimestamps();
    }
}
