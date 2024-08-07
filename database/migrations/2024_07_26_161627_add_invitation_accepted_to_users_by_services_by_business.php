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
        Schema::table('users_by_services_by_businesses', function (Blueprint $table) {
            $table->char('invitation_token', 36)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->boolean('invitation_accepted')->default(false);

            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_by_services_by_businesses', function (Blueprint $table) {
            $table->dropForeign('users_by_services_by_businesses_created_by_foreign');
            $table->dropColumn('invitation_token');
            $table->dropColumn('created_by');
            $table->dropColumn('invitation_accepted');
        });
    }
};
