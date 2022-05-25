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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('first_surname');
            $table->string('second_surname');
            $table->string('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('rfc')->nullable();
            $table->string('ssn')->nullable();
            $table->string('psychometric_test')->unique();
            $table->string('salary')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
