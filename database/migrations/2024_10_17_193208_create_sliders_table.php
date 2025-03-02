<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Kad::class);
            $table->string('image_url_1')->nullable();
            $table->string('image_url_2')->nullable();
            $table->string('image_url_3')->nullable();
            $table->string('image_url_4')->nullable();
            $table->string('image_url_5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
