<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample admin. You can edit this admin in the "factories" folder.
        factory(App\User::class, 1)->create();
    }
}