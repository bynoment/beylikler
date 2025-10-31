<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('geo_provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('bonus_type', ['grain','stone','iron','gold'])->nullable();
            $table->integer('bonus_pct')->default(0); // e.g., +5 means +5%
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('geo_provinces');
    }
};
