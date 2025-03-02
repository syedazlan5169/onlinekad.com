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
            $table->boolean('dua_pasangan_is_on')->default(false);
            $table->string('nama_penuh_pasangan_pertama')->nullable();
            $table->string('nama_penuh_pasangan_kedua')->nullable();
            $table->string('nama_panggilan_pasangan_pertama')->nullable();
            $table->string('nama_panggilan_pasangan_kedua')->nullable();
            $table->string('nama_bapa_pengantin')->nullable();
            $table->string('nama_ibu_pengantin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kads', function (Blueprint $table) {
            $table->dropColumn('dua_pasangan_is_on');
            $table->dropColumn('nama_penuh_pasangan_pertama');
            $table->dropColumn('nama_penuh_pasangan_kedua');
            $table->dropColumn('nama_panggilan_pasangan_pertama');
            $table->dropColumn('nama_panggilan_pasangan_kedua');
            $table->dropColumn('nama_bapa_pengantin');
            $table->dropColumn('nama_ibu_pengantin');
        });
    }
};
