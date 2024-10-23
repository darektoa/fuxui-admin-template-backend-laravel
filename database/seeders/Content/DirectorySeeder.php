<?php

namespace Database\Seeders\Content;

use App\Models\Content\{Page, Directory};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DirectorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = $this->id;

        $depth0 = [
            // id,  directory_id,   menu_id,    name,           depth
            [$id[0],    null,       null,       'Global',           0],
            [$id[1],    null,       null,       'Auth',             0],
            [$id[2],    null,       null,       'Home',             0],
            [$id[3],    null,       null,       'Menus',            0],
            [$id[4],    null,       null,       'Users',            0],
            [$id[5],    null,       null,       'Contents',         0],
        ];

        $depth1 = [
            // id,  directory_id,   menu_id,    name,           depth
            [$id[6],    $id[0],     null,       'App',              1],
            [$id[7],    $id[0],     null,       'Header',           1],
            [$id[8],    $id[0],     null,       'Footer',           1],
            [$id[9],    $id[1],     null,       'Sign In',          1],
            [$id[10],   $id[1],     null,       'Sign Up',          1],
            [$id[11],   $id[1],     null,       'Sign Out',         1],
            [$id[12],   $id[3],     null,       'Permissions',      1],
            [$id[13],   $id[4],     null,       'Roles',            1],
        ];

        $depth2 = [
            // id,  directory_id,   menu_id,    name,           depth
            [$id[14],   $id[12],    null,       'Types',            2],
        ];


        Directory::insert($this->transform($depth0));
        Directory::insert($this->transform($depth1));
        Directory::insert($this->transform($depth2));
    }


    /**
     * List of id for this seeders
     *
     * @var array<int, string>
     */
    public $id = [
        '01JAW6H8R3SAEG4ZBJPR024CV4', // 0
        '01JAW6HKGYJ0QF7BZHCPW4XZMC', // 1
        '01JAW6HZ8D63Q94MRBXAMMYKX1', // 2
        '01JAW6J76PHXV2Y1EJSV5HD5K5', // 3
        '01JAW6JC4PM0ADEGZ9SM106981', // 4
        '01JAW6JRC72QQ9NAHZV5F3WA23', // 5
        '01JAW8ZW2N5YR53FNZQMVPCBMW', // 6
        '01JAW901XK9225ETFZVCDW5VFJ', // 7
        '01JAW90DFMA7VBA9ZZTYV7MHHQ', // 8
        '01JAW90KZMSJHTEFCQV3V8P9ZA', // 9
        '01JAWBH683P6JF1RBZR8M6FB3M', // 10
        '01JAWBHDKQBV1WE9V80F8XRV6A', // 11
        '01JAWBHM6R6GT38Y1A76SP6G5C', // 12
        '01JAWBJ2MGZH6DC8P60CX3VQV3', // 13
        '01JAWBJCY9G47PVXWDBVA0NGV4', // 14
    ];


    /**
     * Converts array data to an array of required fields
     *
     * @return array
     */
    public function transform($data)
    {
        $result     = collect([]);
        $increment  = 0;

        foreach ($data as $item) {
            $result->push([
                'id'            => $item[0] ?? Str::uuid(),
                'directory_id'  => $item[1] ?? null,
                'name'          => $item[2],
                'codename'      => Str::upper(Str::snake($item[2])),
                'order'         => $increment + 1,
                'depth'         => $item[3] ?? 0,
                'created_at'    => now()->addSeconds($increment),
                'updated_at'    => now()->addSeconds($increment++),
            ]);
        }

        return $result->toArray();
    }
}
