<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Child extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child', function(Blueprint $table)
        {
            $table->increments('ID');
            $table->string('Name');
            $table->string('DateOfBirth');
            $table->string('Grade');
            $table->string('School');
            $table->string('ParentID');
            $table->rememberToken();
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
        //
    }
}
