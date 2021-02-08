<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_ingredient', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->bigInteger('food_id')->unsigned();
            $table->bigInteger('ingredient_id')->unsigned();

            $table->timestamps();

            $table->foreign('food_id')->references('id')->on('food');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_ingredient');
    }
}
