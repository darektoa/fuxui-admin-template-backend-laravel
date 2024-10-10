<?php

namespace Database\Seeders\Menu\Permission;

use App\Models\Menu\Permission\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id'        => 1,
                'name'      => 'Read',
            ],
            [
                'id'        => 2,
                'name'      => 'Write',
            ],
            [
                'id'        => 3,
                'name'      => 'Execute',
            ],
        ];

        $users = collect($users)->map(fn ($user, $index) => ([
            ...$user,
            'created_at'        => now()->addMinutes($index),
            'updated_at'        => now()->addMinutes($index),
        ]));

        Type::insert($users->toArray());
    }
}
