<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProjetPartenaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projet_partenaire', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projet_id')->unsigned();
            $table->integer('partenaire_id')->unsigned();
            $table-> foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
            $table-> foreign('partenaire_id')->references('id')->on('partenaires')->onDelete('cascade');
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
        Schema::dropIfExists('projet_partenaire');
    }
}
