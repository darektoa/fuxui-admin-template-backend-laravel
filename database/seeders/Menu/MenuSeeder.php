<?php

namespace Database\Seeders\Menu;

use App\Models\Menu\Menu;
use Database\Seeders\Menu\Permission\PermissionSeeder;
use Database\Seeders\Menu\Permission\TypeSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->before();

        $menus = [
            /**
             * HOME MENU
             */
            [
                'id'                => '01J9TCCAHGHJ0MRX7TY079H8MC',
                'menu_id'           => null,
                'codename'          => 'HOME',
                'icon_uri'          => 'https://example.com/icon.svg',
                'name'              => 'Home',
                'uri'               => '/home',
                'is_external_uri'   => false,
                'description'       => 'This is a home description',
                'tooltip'           => 'Home Menu',
                'depth'             => 0,
                'order'             => 1,
            ],
            /**
             * MENU MANAGEMENT MENU
             */
            [
                'id'                => '01J9TCPRVGJ80BN253HTNR49Z8',
                'menu_id'           => null,
                'codename'          => 'MENUGRP',
                'icon_uri'          => 'https://example.com/icon.svg',
                'name'              => 'Menu Management',
                'uri'               => null,
                'is_external_uri'   => false,
                'description'       => null,
                'tooltip'           => null,
                'depth'             => 0,
                'order'             => 2,
            ],
            [
                'id'                => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'menu_id'           => '01J9TCPRVGJ80BN253HTNR49Z8',
                'codename'          => 'MENU',
                'icon_uri'          => 'https://example.com/icon.svg',
                'name'              => 'Menu',
                'uri'               => '/menus',
                'is_external_uri'   => false,
                'description'       => 'This is a menu management description',
                'tooltip'           => 'Menu Management',
                'depth'             => 1,
                'order'             => 1,
            ],
            [
                'id'                => '01J9TD08T7GB79FPD1TGNBF3V2',
                'menu_id'           => '01J9TCPRVGJ80BN253HTNR49Z8',
                'codename'          => 'MENUPERMTYPE',
                'icon_uri'          => 'https://example.com/icon.svg',
                'name'              => 'Permission Type',
                'uri'               => '/menus/permissions/types',
                'is_external_uri'   => false,
                'description'       => 'This is a menu permission type management description',
                'tooltip'           => 'Menu Permission Type Management',
                'depth'             => 1,
                'order'             => 2,
            ],
            [
                'id'                => '01J9TD4HAWFEPSPKFT43771W6K',
                'menu_id'           => '01J9TCPRVGJ80BN253HTNR49Z8',
                'codename'          => 'MENUPERM',
                'icon_uri'          => 'https://example.com/icon.svg',
                'name'              => 'Permission',
                'uri'               => '/menus/permissions',
                'is_external_uri'   => false,
                'description'       => 'This is a menu permission management description',
                'tooltip'           => 'Menu Permission Management',
                'depth'             => 1,
                'order'             => 3,
            ],
            /**
             * USER MANAGEMENT MENU
             */
            [
                'id'                => '01J9WV5HECVNTMV8SJAPB1HBQJ',
                'menu_id'           => null,
                'codename'          => 'USERGRP',
                'icon_uri'          => 'https://example.com/icon.svg',
                'name'              => 'User Management',
                'uri'               => null,
                'is_external_uri'   => false,
                'description'       => null,
                'tooltip'           => null,
                'depth'             => 0,
                'order'             => 3,
            ],
            [
                'id'                => '01J9WVKCD3BZH5N15BPZNCKHZB',
                'menu_id'           => '01J9WV5HECVNTMV8SJAPB1HBQJ',
                'codename'          => 'USER',
                'icon_uri'          => 'https://example.com/icon.svg',
                'name'              => 'Users',
                'uri'               => '/users',
                'is_external_uri'   => false,
                'description'       => 'This is a user management description',
                'tooltip'           => 'User Management',
                'depth'             => 1,
                'order'             => 1,
            ],
            [
                'id'                => '01J9WVKHA8HX5AM535P9DDX89A',
                'menu_id'           => '01J9WV5HECVNTMV8SJAPB1HBQJ',
                'codename'          => 'USERROLE',
                'icon_uri'          => 'https://example.com/icon.svg',
                'name'              => 'Roles',
                'uri'               => '/users/roles',
                'is_external_uri'   => false,
                'description'       => 'This is a menu user role management description',
                'tooltip'           => 'User Role Management',
                'depth'             => 1,
                'order'             => 2,
            ],
        ];

        $this->creates($menus);
        $this->after();
    }


    /**
     * Insert data to the model of this seeder
     */
    public function insert(array|Collection $data)
    {
        $data = collect($data)->map(fn($item, $index) => collect($item)->merge([
            'created_at' => now()->addMinutes($index),
            'updated_at' => now()->addMinutes($index),
        ]));

        return Menu::insert($data->toArray());
    }

    /**
     * Insert data to the model of this seeder
     */
    public function creates(array|Collection $data)
    {
        $data = collect($data)->each(fn($item) => Menu::create($item));

        return $data->count();
    }


    /**
     * Running before run() method
     */
    public function before(): void
    {
        $this->call([
            TypeSeeder::class,
        ]);
    }


    /**
     * Running after run() method
     */
    public function after(): void
    {
        $this->call([
            PermissionSeeder::class,
        ]);
    }
}
