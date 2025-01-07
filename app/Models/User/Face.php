<?php

namespace App\Models\User;

use App\Traits\Model\CamelCaseAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Face extends Model
{
    use CamelCaseAttributes, HasFactory, HasUlids, SoftDeletes;

    protected $table = 'user_faces';

    /**
     * The attributes that are guarded from mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];


    /**
     * Get user of the current profile picture
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }
}
