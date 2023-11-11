<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id('recipeId');
            $table->string('name', 50);
            $table->text('description');
            $table->enum('category', ['Snacks','Beverage','Main Course','Desserts']);
            $table->string('preptime', 20)->nullable();
            $table->string('cooktime', 20)->nullable();
            $table->text('ingredients');
            $table->text('instructions');
            $table->date('Date')->nullable();
            $table->integer('Rating')->default(0);
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
        Schema::dropIfExists('recipes');
    }
};
