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
            $table->string('school_logo');
            $table->string('school_name');
            $table->string('school_address');
            $table->string('school_email');
            $table->string('school_phone');
            $table->string('registrant_name');
            $table->string('registrant_email');
            $table->string('registrant_number');
            $table->string('registrant_identity_number');
            $table->string('registrant_proof');
            $table->timestamps();
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
