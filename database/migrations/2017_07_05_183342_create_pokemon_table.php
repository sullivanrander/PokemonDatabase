<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->increments('id');
	        $table->string("name");
	        $table->string("type")->nullable();
	        $table->string("type2")->nullable();
	        $table->string("height");
	        $table->string("weight");
	        $table->string("ability1")->nullable();
	        $table->string("ability2")->nullable();
	        $table->string("ability3")->nullable();
	        $table->string("ability4")->nullable();
	        $table->string("hp");
	        $table->string("attack");
	        $table->string("defense");
	        $table->string("spattack");
	        $table->string("spdefense");
	        $table->string("speed");
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
        Schema::dropIfExists('pokemon');
    }
}
