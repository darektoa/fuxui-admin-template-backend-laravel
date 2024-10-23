<?php

namespace App\Models\Content;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Content extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $guarded = [
        'id'
    ];


    protected static function booted()
    {
        static::addGlobalScope('orderByContentName', function (Builder $builder) {
            /** @disregard Intelephnese-P1013, method wasn't indexed */
            $builder->orderBy('name');
        });
    }


    /**
     * Get directory of the content
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function directory() :BelongsTo
    {
        return $this->belongsTo(Directory::class, 'directory_id');
    }


    /**
     * Get content type of the content
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type() :BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }


    /**
     * Get root parent with spesific depth, default depth is 0
     *
     * @param int $depth
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rootDirectory(int $depth = 0) :BelongsTo
    {
        if($this->depth === $depth) return $this;

        return $this->directory?->rootDirectory($depth) ?? $this;
    }


    /**
     * Get full paths of the content
     *
     * @return \Illuminate\Support\Collection
     */
    public function paths() :Collection
    {
        $paths = collect($this?->directory?->paths() ?? []);
        $paths->push($this->id);

        return $paths;
    }
}
