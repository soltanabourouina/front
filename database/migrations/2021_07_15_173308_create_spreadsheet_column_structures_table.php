<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpreadsheetColumnStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spreadsheet_column_structures', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->string('file_variant_code');
            $table->foreign('file_variant_code')->references('code')->on('file_variants')->onDelete('cascade')->onUpdate('cascade');
            $table->string('colonne_bdd');
            $table->string('colonne_client');
            $table->string('colonne_client_verbose');
            $table->timestamps();
        });
        Schema::table('spreadsheet_column_structures', function (Blueprint $table) {
            $table->unique(["file_variant_code", "colonne_bdd"], "scs_unique");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spreadsheet_column_structures');
    }
}
