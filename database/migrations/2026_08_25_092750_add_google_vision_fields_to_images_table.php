<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->json('labels')->nullable();

            $table->string('adult')->nullable();
            $table->string('spoof')->nullable();
            $table->string('racy')->nullable();
            $table->string('medical')->nullable();
            $table->string('violence')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn([
                'labels',
                'adult',
                'spoof',
                'racy',
                'medical',
                'violence',
            ]);
        });
    }
};