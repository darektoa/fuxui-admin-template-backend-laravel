<?php

namespace Database\Seeders\Content;

use App\Models\Content\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = self::$id;

        $types = [
            // id,      name,               description
            [$id[0],    'Text',             'Content type for inputting text'],
            [$id[1],    'Number',           'Content type for inputting number'],
            [$id[2],    'Color',            'Content type for inputting color'],
            [$id[3],    'URL',              'Content type for inputting URL'],
            [$id[4],    'File',             'Content type for inputting file'],
            [$id[5],    'Image',            'Content type for inputting image'],
        ];

        Type::insert($this->transform($types));
    }


    /**
     * List of id for this seeders
     *
     * @var array<int, string>
     */
    public static $id = [
        1, // 0
        2, // 1
        3, // 2
        4, // 3
        5, // 4
        6, // 5
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
                'name'          => $item[1],
                'codename'      => Str::camel(Str::lower($item[1])),
                'description'   => $item[2],
                'created_at'    => now()->addSeconds($index),
                'updated_at'    => now()->addSeconds($index),
            ]);
        }

        return $result->toArray();
    }
}
