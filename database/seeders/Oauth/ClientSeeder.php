<?php

namespace Database\Seeders\Oauth;

use App\Models\Passport\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $clients = [
            [
                'id'                        => '9d37d9a9-c37d-47bc-94cf-1e2c7062e3c5',
                'user_id'                   => NULL,
                'name'                      => 'Fuxui Grant Client',
                'secret'                    => '1vEU9gzLjj51J0LkNrdu6BXTvTvRqcfQWCKd4UVv',
                'provider'                  => NULL,
                'redirect'                  => 'http://localhost/auth/callback',
                'personal_access_client'    => '0',
                'password_client'           => '0',
                'revoked'                   => '0',
            ],
            [
                'id'                        => '9d37d9b4-8283-406c-a846-ae6789dbc3aa',
                'user_id'                   => NULL,
                'name'                      => 'Fuxui ClientCredentials Grant Client',
                'secret'                    => 'al92zBGzrxmP7Xse5lsFqoqozZymmUK6eRr4jqaS',
                'provider'                  => NULL,
                'redirect'                  => 'http://localhost/auth/callback',
                'personal_access_client'    => '0',
                'password_client'           => '0',
                'revoked'                   => '0',
            ],
            [
                'id'                        => '9d37d9cc-5026-4069-8011-11339ed6bcf3',
                'user_id'                   => NULL,
                'name'                      => 'Fuxui Personal Access Client',
                'secret'                    => 'D0uJlgai2Ojqmaw0ndlyx5AzUAsrCFG3c0VpSDkH',
                'provider'                  => NULL,
                'redirect'                  => 'http://localhost/auth/callback',
                'personal_access_client'    => '1',
                'password_client'           => '0',
                'revoked'                   => '0',
            ],
            [
                'id'                        => '9d37d9d6-7fd6-40b5-be5e-f70347439f6c',
                'user_id'                   => NULL,
                'name'                      => 'Fuxui Password Grant Client',
                'secret'                    => 'AZq6rt9HcwWBmlrrswdBqStfgDIDmsF504bwXL6C',
                'provider'                  => 'users',
                'redirect'                  => 'http://localhost/auth/callback',
                'personal_access_client'    => '0',
                'password_client'           => '1',
                'revoked'                   => '0',
            ],
        ];

        $this->insert($clients);
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

        return Client::insert($data->toArray());
    }
}
