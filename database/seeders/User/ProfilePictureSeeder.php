<?php

namespace Database\Seeders\User;

use App\Models\User\ProfilePicture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProfilePictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = self::$id;
        $userIds = UserSeeder::$id;

        $pictures = [
            // id,      user_id,        uri,
            [$id[0],    $userIds[0],     'seeders/users/profilePictures/4908ce38-15d1-4f2a-a1ac-22427b4c1484.svg'],
            [$id[1],    $userIds[1],     'seeders/users/profilePictures/141399c2-53a3-4345-bf14-eadead11f55f.webp'],
        ];

        ProfilePicture::insert($this->transform($pictures));
    }


    /**
     * List of id for this seeders
     *
     * @var array<int, string>
     */
    public static $id = [
        '01JAYBCVDJRM3VJXFWB4X7V5W1', // 1
        '01JAYBD59S2QS8HH2J1W65MZAP', // 2
        '01JAYBDC95DK2G1DKTQJD239ZE', // 3
    ];


    /**
     * Converts array data to an array of required fields
     *
     * @return array
     */
    public function transform($data)
    {
        $result = collect([]);

        foreach ($data as $index => $item) {
            $result->push([
                'id'            => $item[0] ?? Str::ulid(),
                'user_id'       => $item[1],
                'uri'           => $item[2],
                'alt'           => Str::camel($item[1]),
                'created_at'    => now()->addSeconds($index),
                'updated_at'    => now()->addSeconds($index),
            ]);
        }

        return $result->toArray();
    }
}
