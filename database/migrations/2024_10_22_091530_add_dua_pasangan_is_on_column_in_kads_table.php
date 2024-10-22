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
            $table->boolean('dua_pasangan_is_on')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kads', function (Blueprint $table) {
            $table->dropColumn('dua_pasangan_is_on');
        });
    }
};
