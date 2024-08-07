<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36)->default(DB::raw('(UUID())'));
            $table->string('name');
            $table->string('economic_sector_id');
            $table->string('economic_sector');
            $table->string('business_activity_id');
            $table->string('business_activity');
            $table->boolean('verified')->nullable();
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('contact_id');
            $table->unsignedBigInteger('created_by');
            $table->boolean('status')->nullable()->default(true);
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('owner_id')->references('id')->on('people');
            $table->foreign('contact_id')->references('id')->on('people');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
