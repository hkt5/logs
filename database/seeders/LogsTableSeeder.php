<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogsTableSeeder extends Seeder {

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $index = 0;
        do {
            DB::table('logs')->insert([
                [
                    'user' => 'user',
                    'base_path' => '/',
                    'client_ip' => '127.0.0.1',
                    'host' => 'http://localhost',
                    'query_string' => 'name=hello_world',
                    'request_uri' => '/create',
                    'user_info' => 'user_info',
                    'message' => 'hello',
                    'reason' => 'world',
                ]
            ]);
            $index++;
        } while($index < 20);
    }
}
