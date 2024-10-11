<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Menu extends Model
{
    use HasFactory, HasUlids;

    /**
     * The attributes that are guarded from mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];


    /**
     * Get parent menu of the current menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu() :BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }


    /**
     * Get root parent with spesific depth, default depth is 0
     *
     * @param int $depth
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rootMenu(int $depth = 0): BelongsTo
    {
        if($this->depth === $depth) return $this->menu;

        return $this->menu?->rootMenu($depth) ?? $this->menu;
    }


    /**
     * Get full id path from parent to current menu
     *
     * @return \Illuminate\Support\Collection
     */
    public function paths(): Collection
    {
        $paths = collect($this?->directory?->paths() ?? []);
        $paths->push($this->id);

        return $paths;
    }
}
