<?php

use Illuminate\Database\Seeder;

class LibrariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a sample Library. You can edit these in the "factories" folder / UserFactory.php.
        factory(App\Library::class, 1)->create();
    }
}