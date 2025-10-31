<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('geo_districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained('geo_provinces')->cascadeOnDelete();
            $table->string('name');
            $table->enum('bonus_type', ['grain','stone','iron','gold'])->nullable();
            $table->integer('bonus_pct')->default(0);
            $table->timestamps();
            $table->unique(['province_id','name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('geo_districts');
    }
};
