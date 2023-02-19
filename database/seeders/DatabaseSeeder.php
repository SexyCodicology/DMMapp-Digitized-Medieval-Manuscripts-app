<?php

namespace Database\Seeders;

use App\Models\Library;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed database only on local and staging environments
        if (App::environment(['local', 'staging'])) {
            Library::factory(100)->create();
            DB::table('users')->insert([
                'name' => 'SexyCodicologist',
                'email' => 'sexycodicology@digitizedmedievalmanuscripts.org',
                'password' => bcrypt(env('STAGING_PASSWORD')),
            ]);
        }

    }
}
