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
        Schema::table('people', function (Blueprint $table) {
            $table->string('aes_time')->nullable();
            $table->integer('aes_memory')->nullable();
            $table->string('rc4_time')->nullable();
            $table->integer('rc4_memory')->nullable();
            $table->string('total_time')->nullable();
            $table->integer('total_memory')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn(['aes_time', 'aes_memory', 'rc4_time', 'rc4_memory', 'total_time', 'total_memory']);
        });
    }
};
