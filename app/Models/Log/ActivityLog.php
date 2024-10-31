<?php

namespace App\Models\Log;

use App\Models\Passport\Client;
use App\Models\Passport\Token;
use App\Models\User\User;
use App\Traits\Model\CamelCaseAttributes;
use App\Traits\Model\EloquentAddition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    use CamelCaseAttributes, EloquentAddition, HasFactory;

    protected $guarded = [
        'id',
    ];

    protected function casts(): array
    {
        return [
            'parametes' => 'object',
            'headers' => 'object',
        ];
    }


    /**
     * Get user of the current profile picture
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accessToken(): BelongsTo
    {
        return $this->belongsTo(Token::class, 'access_token_id');
    }


    /**
     * Get user of the current profile picture
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }


    /**
     * Get user of the current profile picture
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
