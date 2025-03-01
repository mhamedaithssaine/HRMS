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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('emplois_id')->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->foreign('emplois_id')->references('id')->on('emplois')->onDelete('set null');
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['emplois_id']);
            $table->dropForeign(['contract_id']);

            $table->dropColumn('emplois_id');
            $table->dropColumn('contract_id');
        });
    }
};
