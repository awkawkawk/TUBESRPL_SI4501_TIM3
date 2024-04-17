<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('campaigns', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->unsignedBigInteger('target_donation')->nullable();
        $table->string('image')->nullable(); // Make sure this line is in a separate migration if already not included.
        $table->string('donation_type')->nullable(); // This should be added if not present.
        $table->timestamps();
    });
}

}
