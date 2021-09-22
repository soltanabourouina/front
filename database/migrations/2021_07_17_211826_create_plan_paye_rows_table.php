<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanPayeRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_paye_rows', function (Blueprint $table) {
            $table->id();
            $table->string('code_rubrique');
            $table->string('intitule_rubrique');
            $table->string('variant');
            $table->foreign('variant')->references('code')->on('file_variants')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('plan_paye_rows');
    }
}
