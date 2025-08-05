<?php

use App\Models\ServicesByBusiness;
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
        Schema::table('services_by_businesses', function (Blueprint $table) {
            $table->boolean('first_time')->after('created_by')->default(true);
        });

        ServicesByBusiness::query()->update(['first_time' => false]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services_by_businesses', function (Blueprint $table) {
            $table->dropColumn('first_time');
        });
    }
};
