<?php

namespace Database\Seeders\User;

use App\Models\User\User;
use App\Models\User\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->before();
        $id = self::$id;
        $roles = Role::oldest()->get();

        $users = [
            [
                'id'            => $id[0],
                'firstname'     => 'Administrator',
                'lastname'      => 'Example',
                'username'      => 'admin',
                'email'         => 'admin@example.com',
                'password'      => '$2y$12$Ck4D2nnpoBsFbfbfDEAEEeEUqrC3U8bO8hlRCT4PQgWH2FdYR710O' //password
            ],
            [
                'id'            => $id[1],
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
     * List of id for this seeders
     *
     * @var array<int, string>
     */
    public static $id = [
        '01JAYBVD7DZ3P5J1GFCEAYMTVX', // 1
        '01JAYBWS5ER5GCSQ7FT7ZSH4S5', // 2
        '01JAYBWYAFHGGF2Z50PW9SH73C', // 3
    ];


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
     * Running after run() method
     */
    public function after(): void
    {
        $this->call([
            UserRoleSeeder::class,
            ProfilePictureSeeder::class,
        ]);
    }
}
