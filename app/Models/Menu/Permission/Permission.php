<?php

namespace App\Models\Menu\Permission;

use App\Models\User\User;
use App\Traits\Model\CamelCaseAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
     * Get permission types of the menu permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'menu_permission_type_pivot', 'menu_permission_id', 'menu_permission_type_id')
            ->using(MenuPermissionTypePivot::class)
            ->withTimestamps();
    }


    /**
     * Get users of the menu permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'menu_permission_user_role_pivot', 'menu_permission_id', 'user_role_id')
            ->using(UserRolePivot::class)
            ->withTimestamps();
    }
}
