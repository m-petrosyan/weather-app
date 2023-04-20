<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('description')->nullable();
            $table->double('temp')->nullable();
            $table->double('temp_max')->nullable();
            $table->double('temp_min')->nullable();
            $table->double('wind')->nullable();
            $table->smallInteger('humidity')->nullable();
            $table->integer('pressure')->nullable();
            $table->integer('clouds')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
