<?php

namespace Database\Seeders;

use App\Models\Library;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Testing account.
        // This data will only be seeded on local and staging environments. Set the password in
        // your .env file.
        if (App::environment(['local', 'staging'])) {
            Library::factory(100)->create();
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@example.org',
                'password' => bcrypt(env('ADMIN_STAGING_PASSWORD')),
            ]);
        }

    }
}
