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
            $table->string('font_name');
            $table->timestamps();
        });

        // Designs Table
        Schema::create('designs', function (Blueprint $table) {
            $table->id();
            $table->string('design_code');
            $table->string('design_url_1');
            $table->string('design_url_2');
            $table->string('product_image_url');
            $table->string('color_code');
            $table->string('color_footer');
            $table->timestamps();
        });

        // Kads Table
        Schema::create('kads', function (Blueprint $table) {
            $table->id();
            // Maklumat Kad
            $table->string('slug')->unique();
            $table->string('order_id');
            $table->boolean('is_paid')->default(false);
            $table->integer('user_id');
            $table->integer('design_id');
            $table->integer('font_id');
            $table->integer('package_id');
            // Maklumat Pengantin
            $table->string('nama_penuh_lelaki');
            $table->string('nama_penuh_perempuan');
            $table->string('nama_panggilan_lelaki');
            $table->string('nama_panggilan_perempuan');
            $table->string('nama_bapa_pengantin_lelaki')->nullable();
            $table->string('nama_ibu_pengantin_lelaki')->nullable();
            $table->string('nama_bapa_pengantin_perempuan')->nullable();
            $table->string('nama_ibu_pengantin_perempuan')->nullable();
            // Maklumat Majlis
            $table->string('tajuk_kad');
            $table->string('ayat_jemputan');
            $table->date('tarikh_majlis');
            $table->time('masa_mula_majlis');
            $table->time('masa_tamat_majlis');
            $table->string('alamat_majlis');
            $table->string('google_url')->nullable();
            $table->string('waze_url')->nullable();
            $table->json('nombor_telefon')->nullable();
            $table->json('aturcara_majlis')->nullable();
            $table->longText('doa_pengantin')->nullable();
            $table->timestamps();
        });

        // Guestbooks Table
        Schema::create('guestbooks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Kad::class);
            $table->string('author');
            $table->text('wish');
            $table->timestamps();
        });

        // RSVP Table
        Schema::create('rsvps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Kad::class);
            $table->string('nama');
            $table->string('nombor_telefon');
            $table->integer('jumlah_kehadiran')->default(1);
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
