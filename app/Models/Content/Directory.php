<?php

namespace App\Models\Content;

use App\Traits\Model\CamelCaseAttributes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Directory extends Model
{
    use CamelCaseAttributes, HasFactory, HasUlids, SoftDeletes;

    protected $table = 'content_directories';

    protected $guarded = [
        'id'
    ];

    protected $with = [
        'contents',
        'directories',
    ];


    protected static function booted()
    {
        static::addGlobalScope('orderByContentName', function (Builder $builder) {
            /** @disregard Intelephnese-P1013, method wasn't indexed */
            $builder->orderBy('name');
        });
    }


    /**
     * Get contents of the directory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents() :HasMany
    {
        return $this->hasMany(Content::class, 'directory_id')
            ->orderBy('order');
    }


    /**
     * Get directories of the directory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function directories() :HasMany
    {
        return $this->hasMany(Directory::class, 'directory_id')
            ->orderBy('order');
    }


    /**
     * Get page of the directory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function directory() :BelongsTo
    {
        return $this->belongsTo(Directory::class, 'directory_id');
    }


    /**
     * Get root parent with spesific depth, default depth is 0
     *
     * @param int $depth
     */
    public function rootDirectory(int $depth = 0)
    {
        if($this->depth === $depth) return $this->directory;

        return $this->directory?->rootDirectory($depth) ?? $this->directory;
    }


    /**
     * Get full paths of the directory
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
