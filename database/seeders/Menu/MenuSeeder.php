<?php

namespace Database\Seeders\Menu;

use Database\Seeders\Menu\Permission\PermissionSeeder;
use Database\Seeders\Menu\Permission\TypeSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->before();

        $users = [
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
                'id'                => '01J9TCPRVGJ80BN253HTNR49Z8',
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
                'id'                => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'menu_id'           => null,
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
                'id'                => '01J9TD08T7GB79FPD1TGNBF3V2',
                'menu_id'           => '01J9TCPRVGJ80BN253HTNR49Z8',
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

        $users = collect($users)->map(fn ($user, $index) => ([
            ...$user,
            'created_at'    => now()->addMinutes($index),
            'updated_at'    => now()->addMinutes($index),
        ]));

        $this->after();
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
