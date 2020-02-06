<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * NOTE if you do not want to create a Admin user with a unsafe password, remove the "AdminTableSeeder::class," line.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LibrariesTableSeeder::class,
            AdminTableSeeder::class,
        ]);
    }
}
