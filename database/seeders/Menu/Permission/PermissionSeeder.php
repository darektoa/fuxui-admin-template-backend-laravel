<?php

namespace Database\Seeders\Menu\Permission;

use App\Models\Menu\Permission\{Permission, Type};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds., 'W'
     */
    public function run(): void
    {
        $permissionTypes = Type::oldest()->get();

        $permissions = collect([
            [
                'id'        => '01J9TTRZT8BP8MJ70791137CVX',
                'menu_id'   => '01J9TCCAHGHJ0MRX7TY079H8MC', // HOME
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],
            [
                'id'        => '01J9TTS6VXS5K2AX9M7ST51NG6',
                'menu_id'   => '01J9TCCAHGHJ0MRX7TY079H8MC', // HOME
                'name'      => 'Dashboard Section',
                'types'     => ['R'],
            ],
            [
                'id'        => '01J9TVPYXXABPA2T9C3ZGRTR7V',
                'menu_id'   => '01J9TCCAHGHJ0MRX7TY079H8MC', // HOME
                'name'      => 'Summary Statistic Section',
                'types'     => ['R'],
            ],

            /**
             * MENU MANAGEMENT
             */
            [
                'id'        => '01J9TWVB8YBTS8QGZJS1R70EZ8',
                'menu_id'   => '01J9TCPRVGJ80BN253HTNR49Z8',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01J9TWVNNM3F3BDSQEYP4XZHCZ',
                'menu_id'   => '01J9TCPRVGJ80BN253HTNR49Z8',
                'name'      => 'Create',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TWVW8QT0666NWY0PY107AB',
                'menu_id'   => '01J9TCPRVGJ80BN253HTNR49Z8',
                'name'      => 'Detail',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01J9TWW1Z5T4YDNJYNA5548HNN',
                'menu_id'   => '01J9TCPRVGJ80BN253HTNR49Z8',
                'name'      => 'Edit',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TWW7MNEHX60XHRV54K2SVQ',
                'menu_id'   => '01J9TCPRVGJ80BN253HTNR49Z8',
                'name'      => 'Delete',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TWWCWXSD1F53VWHCBV6AEW',
                'menu_id'   => '01J9TCPRVGJ80BN253HTNR49Z8',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01J9TWWWASAE23483E02F6PWGD',
                'menu_id'   => '01J9TCPRVGJ80BN253HTNR49Z8',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],

            /**
             * MENU PERMISSION TYPE MANAGEMENT
             */
            [
                'id'        => '01J9TWX9P8SAR4PRDR96MQB27A',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01J9TWXEHPVQAEBSWWK13TRBYX',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Create',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TWXKS7T0WSF4Z90BXFMBZQ',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Detail',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01J9TWXST4F20FVBDJ4CBFBRHM',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Edit',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TWY08DS5XRKG5N29K1K0JE',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Delete',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TWYCEMSY260SK0N6T8K735',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01J9TWYK87FQWHHTY1PG4RC6TB',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],

            /**
             * MENU PERMISSION MANAGEMENT
             */
            [
                'id'        => '01J9TWYY0F1TSKDRD7184BDJDV',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01J9TWZ38DWFQ5W2XT5JM94WRG',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Create',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TWZ80GV2ZQDPWTV5SSGBSD',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Detail',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01J9TWZD8HA1J2DSBRZDPSN8T4',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Edit',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TWZJB4MKPXZB6QFMA3V3M0',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Delete',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TWZT1CKB89Y7XF1FVGEX8F',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01J9TWZZ3NN2BG20SXX0HDCA0V',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],

            /**
             * USER MANAGEMENT
             */
            [
                'id'        => '01J9TX077NQY7Q1JGG5HM373FK',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01J9TX0D5BH84GZ9826XWZA8NB',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Create',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TX0KV0Q7DC6R9ESYZB5SFP',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Detail',
                'types'     => ['R'],
            ],
            [
                'id'        => '01J9TX0T12X3MTJNXF43A5XA3D',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Edit',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TX0ZBKJTPYCRNX130N1BXF',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Delete',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TX14Q5D4SX4KW832F0CEGC',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01J9TX1CXEVWWPESNZN2XER5FJ',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],

            /**
             * USER ROLE MANAGEMENT
             */
            [
                'id'        => '01J9TX1PWSVRXHQHCZTGMAH70V',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01J9TX1W4F65ZTHCJNY5N4MZ65',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Create',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TX22PGTB8SND15Z60SMK8T',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Detail',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01J9TX29F2SZENSZ54C7DPVHG0',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Edit',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TX2FGQJH2VF2WZ4MTJSJV6',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Delete',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01J9TX2P7TN76XZHN51KJDRS24',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01J9TX2WWHRGB3YNVRNX648HCD',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],
        ]);

        $permissions = collect($permissions)->map(fn ($user, $index) => ([
            ...$user,
            'created_at'        => now()->addMinutes($index),
            'updated_at'        => now()->addMinutes($index),
        ]));

        Permission::insert($permissions->toArray());

        $permissionTypes[0]->permissions()->attach($permissions->contain);
    }
}
