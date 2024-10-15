<?php

namespace App\Models\Menu\Permission;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $table = 'menu_permission_types';

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
     * Get permissions of the permission type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
                related: Type::class,
                table: 'menu_permission_type_pivot',
                foreignPivotKey: 'menu_permission_type_id',
                relatedPivotKey: 'menu_permission_id',
            )
            ->using(MenuPermissionTypePivot::class)
            ->withTimestamps();
    }
}
