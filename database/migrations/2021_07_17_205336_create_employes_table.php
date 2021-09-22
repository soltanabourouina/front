<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->unique();
            $table->string('last_name');
            $table->string('first_name')->nullable();
            $table->date('date_naissance');
            $table->enum('gender', ['M', 'F', 'O', 'U']);
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->string('nni')->nullable();
            $table->date('date_anciennete');
            $table->date('date_entree_groupe')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
