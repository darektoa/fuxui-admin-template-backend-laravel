<?php

namespace App\Traits\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Schema;

trait EloquentAddition{
    public function scopeExcept($query, $excludes=[])
    {
        $excludes = collect($excludes)->toArray();
        $columns  = Schema::getColumnListing($this->getTable());
        $columns  = array_diff($columns, $excludes);
        return $query->select($columns);
    }
    
    public static function getColumns()
    {
        $columns  = Schema::getColumnListing((new Self)->getTable());
        return $columns;
    }
}