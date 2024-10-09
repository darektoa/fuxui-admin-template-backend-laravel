<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $table = 'user_roles';

    protected $guarded = [
        'id'
    ];


    /**
     * Get the users of the role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() :BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_role_pivot', 'role_id', 'user_id')
            ->using(UserRolePivot::class)
            ->withTimestamps();
    }
}
