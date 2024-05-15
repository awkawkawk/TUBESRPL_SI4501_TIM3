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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('logo_sekolah')->nullable();
            $table->string('nama_sekolah');
            $table->string('alamat_sekolah');
            $table->string('no_telepon_sekolah')->unique();
            $table->string('email_sekolah')->unique();
            $table->string('nama_pendaftar')->nullable();
            $table->string('no_hp_pendaftar')->nullable();
            $table->string('email_pendaftar')->nullable();
            $table->string('identitas_pendaftar')->nullable();
            $table->string('bukti_id_pendaftar')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
