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
        Schema::create('daily_page_stats', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('url');
            $table->unsignedInteger('total_visits');
            $table->unsignedInteger('unique_ips');
            $table->timestamps();
        
            $table->unique(['date', 'url']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_page_stats');
    }
};
