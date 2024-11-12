<?php

namespace Database\Seeders\Content;

use App\Models\Content\Directory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->before();
        $typeIds = TypeSeeder::$id;

        $appContents = [
            [
                'type_id'   => $typeIds[0],
                'name'      => 'Name',
                'codename'  => 'appName',
                'value'     => 'Fuxui Dashboard',
                'order'     => 1,
            ],
            [
                'type_id'   => $typeIds[0],
                'name'      => 'Short Name',
                'codename'  => 'appShortName',
                'value'     => 'Fuxui',
                'order'     => 2,
            ],
            [
                'type_id'   => $typeIds[0],
                'name'      => 'Alias Name',
                'codename'  => 'appAliasName',
                'value'     => 'FD',
                'order'     => 3,
            ],
            [
                'type_id'   => $typeIds[0],
                'name'      => 'Tagline',
                'codename'  => 'appTagline',
                'value'     => 'Modern template for modern programmers',
                'order'     => 4,
            ],
            [
                'type_id'   => $typeIds[5],
                'name'      => 'Logo',
                'codename'  => 'appLogo',
                'value'     => 'seeders/contents/4ad05761-efba-44b8-8e7a-4a8b61ff6003.svg',
                'order'     => 5,
            ],
            [
                'type_id'   => $typeIds[5],
                'name'      => 'Favicon',
                'codename'  => 'appFavicon',
                'value'     => 'seeders/contents/ca08c7da-05b4-4bcd-861f-b2288d61f2b2.svg',
                'order'     => 6,
            ],
            [
                'type_id'   => $typeIds[0],
                'name'      => 'Web Title',
                'codename'  => 'appWebTitle',
                'value'     => 'Fuxui Dashboard',
                'order'     => 7,
            ],
        ];

        $authSignInContents = [
            [
                'type_id'   => $typeIds[0],
                'name'      => 'Heading 1',
                'codename'  => 'authSignInHeading1',
                'value'     => 'Sign-In',
                'order'     => 1,
            ],
            [
                'type_id'   => $typeIds[0],
                'name'      => 'Button Login Text',
                'codename'  => 'authSignInBtnLoginText',
                'value'     => 'Login',
                'order'     => 2,
            ],
        ];

        $footerContents = [
            [
                'type_id'   => $typeIds[0],
                'name'      => 'Copyright',
                'codename'  => 'footerCopyright',
                'value'     => 'Sign-In',
                'order'     => 1,
            ],
        ];

        foreach($appContents as $content) {
            Directory::where('codename', 'globalApp')
                ->first()
                ->contents()
                ->create($content);
        }

        foreach($authSignInContents as $content) {
            Directory::where('codename', 'authSignIn')
                ->first()
                ->contents()
                ->create($content);
        }

        foreach($footerContents as $content) {
            Directory::where('codename', 'globalFooter')
                ->first()
                ->contents()
                ->create($content);
        }
    }


    /**
     * Running before run() method
     */
    public function before(): void
    {
        $this->call([
            TypeSeeder::class,
            DirectorySeeder::class,
        ]);
    }


    /**
     * Running after run() method
     */
    public function after(): void
    {
        $this->call([

        ]);
    }
}
