<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Log;

class ImportBoletosSeeder extends Seeder
{
    public function run()
    {
        $sql = base_path('docs/sql/boletosLasBrisasBACKUP.sql');

        $db = [
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'database' => env('DB_DATABASE')
        ];

        exec("mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database {$db['database']} < $sql");

        Log::info('SQL Import Done');
    }
}
