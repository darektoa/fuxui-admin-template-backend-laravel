<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Menu\Permission\UserRolePivotSeeder as MenuPermissionUserRolePivotSeeder;
use Database\Seeders\Menu\MenuSeeder;
use Database\Seeders\Oauth\ClientSeeder as OauthClientSeeder;
use Database\Seeders\User\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MenuSeeder::class,
            UserSeeder::class,
            OauthClientSeeder::class,
            MenuPermissionUserRolePivotSeeder::class,
        ]);
    }
}
