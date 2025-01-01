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
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('qr_image')->nullable();
            $table->boolean('gift_is_on')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kads', function (Blueprint $table) {
            $table->dropColumn('account_number');
            $table->dropColumn('qr_image');
            $table->dropColumn('gift_is_on');
            $table->dropColumn('bank_name');
        });
    }
};
