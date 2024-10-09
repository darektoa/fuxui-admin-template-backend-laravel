<?php

namespace Database\Seeders\User;

use App\Models\User\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id'            => '01J9MWXVCKF305N05X1Q74XMTR',
                'name'          => 'Super Admin',
                'codename'      => 'SUPERADMIN',
            ],
            [
                'id'            => '01J9MWYDS70QYH2AFADEX4NDVG',
                'name'          => 'Admin',
                'codename'      => 'ADMIN',
            ],
            [
                'id'            => '01J9MWYPD764JYT0KN6WYE15G7',
                'name'          => 'User',
                'codename'      => 'USER',
            ],
        ];

        $roles = collect($roles)->map(fn($role, $index) => ([
            ...$role,
            'created_at' => now()->addMinutes($index),
            'updated_at' => now()->addMinutes($index),
        ]));

        Role::insert($roles->toArray());
    }
}
