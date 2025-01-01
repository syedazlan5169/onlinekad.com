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
            $table->integer('bg_song_option')->default(1);
            $table->string('uploaded_song_name')->nullable();
            $table->string('uploaded_song_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kads', function (Blueprint $table) {
            $table->dropColumn('bg_song_option');
            $table->dropColumn('uploaded_song_name');
            $table->dropColumn('uploaded_song_url');
        });
    }
};
