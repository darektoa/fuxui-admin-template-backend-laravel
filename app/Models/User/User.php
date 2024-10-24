<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\Model\CamelCaseAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use CamelCaseAttributes, HasApiTokens, HasFactory, HasUlids, Notifiable, SoftDeletes;

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
        'password',
        'pivot',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Get roles of the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() :BelongsToMany
    {
        return $this->belongsToMany(
                related: Role::class,
                table: 'user_role_pivot',
                foreignPivotKey: 'user_id',
                relatedPivotKey: 'role_id',
            )
            ->using(RolePivot::class)
            ->withTimestamps();
    }


    /**
     * Get profile pictures of the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profilePictures() :HasMany
    {
        return $this->hasMany(
                related: Role::class,
                foreignKey: 'user_id',
            );
    }


    /**
     * Get client from OAuth access token;
     */
    public function client()
    {
        return $this->accessToken->client;
    }
}
