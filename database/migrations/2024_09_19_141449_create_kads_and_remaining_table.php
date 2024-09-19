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
        // Fonts Table
        Schema::create('fonts', function (Blueprint $table) {
            $table->id();
            $table->string('font_url');
            $table->timestamps();
        });

        // Designs Table
        Schema::create('designs', function (Blueprint $table) {
            $table->id();
            $table->string('design_code');
            $table->string('design_url');
            $table->timestamps();
        });

        // Kads Table
        Schema::create('kads', function (Blueprint $table) {
            $table->id();
            
            $table->string('order_id');
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('design_id')->constrained('designs')->onDelete('cascade');
            $table->foreignId('font_id')->constrained('fonts')->onDelete('cascade');
            $table->string('tajuk_kad');
            $table->string('nama_penuh_lelaki');
            $table->string('nama_penuh_perempuan');
            $table->string('nama_panggilan_lelaki');
            $table->string('nama_panggilan_perempuan');
            $table->string('nama_bapa_pengantin');
            $table->string('nama_ibu_pengantin');
            $table->date('tarikh_majlis');
            $table->time('masa_mula_majlis');
            $table->time('masa_tamat_majlis');
            $table->string('alamat_majlis');
            $table->string('google_url')->nullable();
            $table->string('waze_url')->nullable();
            $table->json('nombor_telefon')->nullable();
            $table->json('aturcara_majlis')->nullable();
            $table->timestamps();
        });

        // Guestbooks Table
        Schema::create('guestbooks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kad_id')->constrained('kads')->onDelete('cascade');
            $table->string('author');
            $table->text('wish');
            $table->date('created_at')->nullable();  // To store guestbook entry creation date
        });

        // RSVP Table
        Schema::create('rsvp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kad_id')->constrained('kads')->onDelete('cascade');
            $table->string('nama');
            $table->string('nombor_telefon');
            $table->integer('jumlah_kehadiran');
            $table->string('kehadiran');  // Possibly this is a varchar or enum
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rsvp');
        Schema::dropIfExists('guestbooks');
        Schema::dropIfExists('kads');
        Schema::dropIfExists('designs');
        Schema::dropIfExists('fonts');
    }
};
