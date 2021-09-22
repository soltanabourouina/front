<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulationEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulation_events', function (Blueprint $table) {
            $table->id();
            $table->string('simulation_code');
            $table->foreign('simulation_code', 'event_simulation_code')->references('code')->on('simulations')->onDelete('cascade');
            $table->string('year');
            $table->string('month');
            $table->string('description');
            $table->string('action');
            $table->json('data');
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
        Schema::dropIfExists('simulation_events');
    }
}
