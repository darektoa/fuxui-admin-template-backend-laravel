<?php

namespace Database\Seeders\Menu\Permission;

use App\Models\Menu\Permission\Permission;
use App\Models\User\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRolePivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::oldest()->get();
        $permissions = Permission::oldest()->get();

        $roles->where('codename', 'SUPERADMIN')
            ->first()
            ->permissions()
            ->attach($permissions->pluck('id'));

        $roles->where('codename', 'ADMIN')
            ->first()
            ->permissions()
            ->attach($permissions->pluck('id'));

        $roles->where('codename', 'USER')
            ->first()
            ->permissions()
            ->attach($permissions->pluck('id'));
    }
}
