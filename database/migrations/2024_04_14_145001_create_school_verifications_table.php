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
        Schema::create('school_verifications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('schoolLogo');
            $table->string('schoolName');
            $table->string('schoolAddress');
            $table->string('schoolEmail');
            $table->string('schoolPhone');
            $table->string('username');
            $table->string('password');
            $table->string('registrantName');
            $table->string('registrantEmail');
            $table->string('registrantNumber');
            $table->string('registrantIdentityNumber');
            $table->string('registrantProof');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_verifications');
    }
};
