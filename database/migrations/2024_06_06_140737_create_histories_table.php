<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void{Schema::create('histories', function (Blueprint $table) {$table->id();$table->unsignedBigInteger('id_money_donation');$table->enum('status', ['pending', 'approved'])->default('pending');$table->decimal('nominal_pencairan', 10, 2)->nullable();$table->unsignedBigInteger('id_tahap_pencairan')->nullable();$table->unsignedBigInteger('id_method_payment')->nullable();$table->unsignedBigInteger('id_request_pencairan')->nullable();$table->string('nama_pemilik')->nullable();$table->string('nomor_rekening')->nullable();$table->string('pendukung')->nullable();$table->timestamps();

            $table->foreign('id_money_donation')->references('id')->on('money_donations')->onDelete('cascade');
            $table->foreign('id_tahap_pencairan')->references('id')->on('tahap_pencairan')->onDelete('cascade')->nullable();
            $table->foreign('id_request_pencairan')->references('id')->on('request_pencairan')->onDelete('cascade')->nullable();
            $table->foreign('id_method_payment')->references('id')->on('method_payments')->onDelete('cascade')->nullable();
        });
    }


  public function down(): void{Schema::dropIfExists('histories');}
};
