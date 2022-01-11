<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketballTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basketball_teams', function (Blueprint $table) {
            $table->id();
            $table->string('abbreviation');
            $table->string('city');
            $table->string('conference');
            $table->string('division');
            $table->string('full_name');
            $table->string('name');
            $table->integer('team_id');
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
        Schema::dropIfExists('basketball_teams');
    }
}
