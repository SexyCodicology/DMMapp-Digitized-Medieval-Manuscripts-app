<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
/* NOTE Here you can define what your database should look like. You can define the table name ("libraries", in this case) and the columns ("id", "nation", etc.)" */
class CreateLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nation');
            $table->string('city');
            $table->string('library');
            $table->string('lat');
            $table->string('lng');
            $table->string('quantity');
            $table->string('website');
            $table->string('copyright');
            $table->string('notes');
            $table->string('iiif');
            $table->string('is_part_of');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libraries');
    }
}
