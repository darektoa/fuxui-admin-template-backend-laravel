<?php

namespace Database\Seeders\User;

use App\Models\User\User;
use App\Models\User\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Running before run() method
     */
    public function before(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->before();
        $roles = Role::oldest()->get();

        $users = [
            [
                'id'            => '01J9MWZ6Q0FRPC6DJ0ZY2TSMGA',
                'firstname'     => 'Administrator',
                'lastname'      => 'Example',
                'username'      => 'admin',
                'email'         => 'admin@example.com',
                'password'      => '$2y$12$Ck4D2nnpoBsFbfbfDEAEEeEUqrC3U8bO8hlRCT4PQgWH2FdYR710O' //password
            ],
            [
                'id'            => '01J9MWZE8VDM2CA6JWFH6WP726',
                'firstname'     => 'User',
                'lastname'      => 'Example',
                'username'      => 'user',
                'email'         => 'user@example.com',
                'password'      => '$2y$12$Ck4D2nnpoBsFbfbfDEAEEeEUqrC3U8bO8hlRCT4PQgWH2FdYR710O' //password
            ],
        ];

        $users = collect($users)->map(fn ($user, $index) => ([
            ...$user,
            'email_verified_at' => now()->addMinutes($index),
            'created_at'        => now()->addMinutes($index),
            'updated_at'        => now()->addMinutes($index),
        ]));

        User::insert($users->toArray());
        $this->after();
    }


    /**
     * Running after run() method
     */
    public function after(): void
    {
        $this->call([
            UserRoleSeeder::class,
            // ProfilePictureSeeder::class,
        ]);
    }
}
