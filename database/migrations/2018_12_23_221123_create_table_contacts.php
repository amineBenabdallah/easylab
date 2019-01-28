<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('prenom',45)->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->string('date_naissance',45)->nullable();
            $table->string('grade',20)->nullable();
            $table->string('num_tel')->nullable();
            $table->integer('idPartenaire')->unsigned();
            $table->timestamps();
            $table-> foreign('idPartenaire')->references('id')->on('partenaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
