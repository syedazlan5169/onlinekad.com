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
        Schema::table('kads', function (Blueprint $table) {
            $table->boolean('is_english')->default(0);
        });

        Schema::table('designs', function (Blueprint $table) {
            $table->string('primary_text_color')->nullable();
            $table->string('secondary_text_color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kads', function (Blueprint $table) {
            $table->dropColumn('is_english');
        });

        Schema::table('designs', function (Blueprint $table) {
            //
        });
    }
};
