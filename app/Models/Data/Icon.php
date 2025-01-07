<?php

namespace App\Models\Data;

use App\Traits\Model\CamelCaseAttributes;
use App\Traits\Model\EloquentAddition;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Icon extends Model
{
    use CamelCaseAttributes, EloquentAddition, HasFactory, HasUlids, SoftDeletes;

    protected $table = 'icons';

    protected $guarded = [
        'id',
    ];
}
