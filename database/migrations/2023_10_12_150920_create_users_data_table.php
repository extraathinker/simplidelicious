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
        Schema::create('users_data', function (Blueprint $table) {
            $table->id('userId');
            $table->string('name', 50);
            $table->enum('gender',['Male','Female','Others']);
            $table->string('username', 50);
            $table->string('email', 100);
            $table->string('city',20)->nullable();
            $table->string('state',20)->nullable();
            $table->string('country',20)->nullable();
            $table->date('dateofbirth')->nullable();
            $table->string('password');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('users_data');
    }
};
