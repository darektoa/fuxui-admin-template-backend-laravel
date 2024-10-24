<?php

namespace App\Models\Content;

use App\Traits\Model\CamelCaseAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use CamelCaseAttributes, HasFactory, SoftDeletes;

    protected $table = 'content_types';

    protected $guarded = [
        'id'
    ];

    
    /**
     * Get contents of the content type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents() :HasMany
    {
        return $this->hasMany(
            related: Content::class,
            foreignKey: 'directory_id',
            localKey: 'id',
        );
    }
}
