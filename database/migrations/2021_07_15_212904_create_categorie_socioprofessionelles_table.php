<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieSocioprofessionellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_socioprofessionelles', function (Blueprint $table) {
            $table->id();
            // $table->string('code')->unique();
            $table->string('abreviation')->unique();
            $table->string('libelle')->unique();
            $table->boolean('cadre');
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
        Schema::dropIfExists('categorie_socioprofessionelles');
    }
}
