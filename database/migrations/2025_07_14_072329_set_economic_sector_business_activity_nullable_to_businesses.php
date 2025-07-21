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
        Schema::table('businesses', function (Blueprint $table) {
            $table->string('economic_sector_id')->nullable()->change();
            $table->string('economic_sector')->nullable()->change();
            $table->string('business_activity_id')->nullable()->change();
            $table->string('business_activity')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->string('economic_sector_id')->change();
            $table->string('economic_sector')->change();
            $table->string('business_activity_id')->change();
            $table->string('business_activity')->change();
        });
    }
};
