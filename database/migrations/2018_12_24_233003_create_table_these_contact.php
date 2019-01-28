<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTheseContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('these_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('these_id')->unsigned();
            $table->integer('contact_id')->unsigned();
            $table-> foreign('these_id')->references('id')->on('theses')->onDelete('cascade');
            $table-> foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
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
        Schema::dropIfExists('these_contact');
    }
}
