<?php

namespace Database\Seeders\Menu\Permission;

use App\Models\Menu\Permission\{Permission, Type};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permTypes      = Type::oldest()->get();
        $permissions    = collect([
            [
                'id'        => '01JDKB58YPGW9G9EJYVVYCA2AR',
                'menu_id'   => '01J9TCCAHGHJ0MRX7TY079H8MC', // HOME
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP66Z',
                'menu_id'   => '01J9TCCAHGHJ0MRX7TY079H8MC', // HOME
                'name'      => 'Dashboard Section',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP670',
                'menu_id'   => '01J9TCCAHGHJ0MRX7TY079H8MC', // HOME
                'name'      => 'Summary Statistic Section',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP671',
                'menu_id'   => '01J9TCCAHGHJ0MRX7TY079H8MC', // HOME
                'name'      => 'Summary Statistic Chart Section',
                'types'     => ['R'],
            ],

            /**
             * MENU GROUP MANAGEMENT
             */
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP672',
                'menu_id'   => '01J9TCPRVGJ80BN253HTNR49Z8',
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],

            /**
             * MENU MANAGEMENT
             */
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP673',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP674',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP675',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Create',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP676',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Detail',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP677',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Edit',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP678',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Delete',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP679',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67A',
                'menu_id'   => '01J9TCQ6G50TR26C8P5M7MRHM2',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],

            /**
             * MENU PERMISSION TYPE MANAGEMENT
             */
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67B',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67C',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67D',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Create',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67E',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Detail',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67F',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Edit',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67G',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Delete',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67H',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67J',
                'menu_id'   => '01J9TD08T7GB79FPD1TGNBF3V2',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],

            /**
             * MENU PERMISSION MANAGEMENT
             */
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67K',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67M',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67N',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Create',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67P',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Detail',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67Q',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Edit',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67R',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Delete',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67S',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67T',
                'menu_id'   => '01J9TD4HAWFEPSPKFT43771W6K',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],

            /**
             * USER GROUP MANAGEMENT
             */
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67V',
                'menu_id'   => '01J9WV5HECVNTMV8SJAPB1HBQJ',
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],

            /**
             * USER MANAGEMENT
             */
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67W',
                'menu_id'   => '01J9WVKCD3BZH5N15BPZNCKHZB',
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67X',
                'menu_id'   => '01J9WVKCD3BZH5N15BPZNCKHZB',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67Y',
                'menu_id'   => '01J9WVKCD3BZH5N15BPZNCKHZB',
                'name'      => 'Create',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP67Z',
                'menu_id'   => '01J9WVKCD3BZH5N15BPZNCKHZB',
                'name'      => 'Detail',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP680',
                'menu_id'   => '01J9WVKCD3BZH5N15BPZNCKHZB',
                'name'      => 'Edit',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP681',
                'menu_id'   => '01J9WVKCD3BZH5N15BPZNCKHZB',
                'name'      => 'Delete',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP682',
                'menu_id'   => '01J9WVKCD3BZH5N15BPZNCKHZB',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP683',
                'menu_id'   => '01J9WVKCD3BZH5N15BPZNCKHZB',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],

            /**
             * USER ROLE MANAGEMENT
             */
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP684',
                'menu_id'   => '01J9WVKHA8HX5AM535P9DDX89A',
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP685',
                'menu_id'   => '01J9WVKHA8HX5AM535P9DDX89A',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP686',
                'menu_id'   => '01J9WVKHA8HX5AM535P9DDX89A',
                'name'      => 'Create',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP687',
                'menu_id'   => '01J9WVKHA8HX5AM535P9DDX89A',
                'name'      => 'Detail',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP688',
                'menu_id'   => '01J9WVKHA8HX5AM535P9DDX89A',
                'name'      => 'Edit',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP689',
                'menu_id'   => '01J9WVKHA8HX5AM535P9DDX89A',
                'name'      => 'Delete',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68A',
                'menu_id'   => '01J9WVKHA8HX5AM535P9DDX89A',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68B',
                'menu_id'   => '01J9WVKHA8HX5AM535P9DDX89A',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],

            /**
             * CONTENT GROUP MANAGEMENT
             */
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68C',
                'menu_id'   => '01JAYDNTYGJ4FVCT4JJHH0VBPG',
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],

            /**
             * CONTENT MANAGEMENT
             */
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68D',
                'menu_id'   => '01JAYE1PC12Y439M0H891QGQQP',
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68E',
                'menu_id'   => '01JAYE1PC12Y439M0H891QGQQP',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68F',
                'menu_id'   => '01JAYE1PC12Y439M0H891QGQQP',
                'name'      => 'Create',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68G',
                'menu_id'   => '01JAYE1PC12Y439M0H891QGQQP',
                'name'      => 'Detail',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68H',
                'menu_id'   => '01JAYE1PC12Y439M0H891QGQQP',
                'name'      => 'Edit',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68J',
                'menu_id'   => '01JAYE1PC12Y439M0H891QGQQP',
                'name'      => 'Delete',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68K',
                'menu_id'   => '01JAYE1PC12Y439M0H891QGQQP',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68M',
                'menu_id'   => '01JAYE1PC12Y439M0H891QGQQP',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],

            /**
             * CONTENT TYPE MANAGEMENT
             */
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68N',
                'menu_id'   => '01JAYE29PKC4QC3V7J63K6Q1YJ',
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68P',
                'menu_id'   => '01JAYE29PKC4QC3V7J63K6Q1YJ',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68Q',
                'menu_id'   => '01JAYE29PKC4QC3V7J63K6Q1YJ',
                'name'      => 'Create',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68R',
                'menu_id'   => '01JAYE29PKC4QC3V7J63K6Q1YJ',
                'name'      => 'Detail',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68S',
                'menu_id'   => '01JAYE29PKC4QC3V7J63K6Q1YJ',
                'name'      => 'Edit',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68T',
                'menu_id'   => '01JAYE29PKC4QC3V7J63K6Q1YJ',
                'name'      => 'Delete',
                'types'     => ['R', 'W', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68V',
                'menu_id'   => '01JAYE29PKC4QC3V7J63K6Q1YJ',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68W',
                'menu_id'   => '01JAYE29PKC4QC3V7J63K6Q1YJ',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],

            /**
             * LOGS GROUP
             */
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68X',
                'menu_id'   => '01JBVAFSDV4PC0H286P9KKBH2E',
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],

            /**
             * ACTIVITY LOGS
             */
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68Y',
                'menu_id'   => '01JBVASX17ZHC4FS8GDXPW0GJH',
                'name'      => 'Show On Sidebar',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP68Z',
                'menu_id'   => '01JBVASX17ZHC4FS8GDXPW0GJH',
                'name'      => 'List Table',
                'types'     => ['R'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP690',
                'menu_id'   => '01JBVASX17ZHC4FS8GDXPW0GJH',
                'name'      => 'Detail',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP691',
                'menu_id'   => '01JBVASX17ZHC4FS8GDXPW0GJH',
                'name'      => 'Export PDF',
                'types'     => ['R', 'X'],
            ],
            [
                'id'        => '01JDKB58YQNTN1HHF0TBKVP692',
                'menu_id'   => '01JBVASX17ZHC4FS8GDXPW0GJH',
                'name'      => 'Export Excel',
                'types'     => ['R', 'X'],
            ],
        ]);


        $this->insert($permissions);

        $permTypes->where('name', 'Read')
            ->first()
            ->permissions()
            ->attach($this->filterByType($permissions, 'R')->pluck('id'));

        $permTypes->where('name', 'Write')
            ->first()
            ->permissions()
            ->attach($this->filterByType($permissions, 'W')->pluck('id'));

        $permTypes->where('name', 'Execute')
            ->first()
            ->permissions()
            ->attach($this->filterByType($permissions, 'X')->pluck('id'));

    }


    /**
     * Insert data to the model of this seeder
     */
    public function insert(array|Collection $data)
    {
        $data = collect($data)->map(fn($item, $index) => collect($item)->except('types')->merge([
            'created_at' => now()->addMinutes($index),
            'updated_at' => now()->addMinutes($index),
        ]));

        return Permission::insert($data->toArray());
    }


    /**
     * Filter permission data by permission type initials
     */
    public function filterByType(Collection $data, string $permissionTypeInitials): Collection
    {
        return $data->filter(fn($item) => (
            collect($item['types'])->contains($permissionTypeInitials)
        ));
    }
}
