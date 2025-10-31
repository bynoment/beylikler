<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('realms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->decimal('rate_prod', 5, 2)->default(1.0);
            $table->decimal('rate_train', 5, 2)->default(1.0);
            $table->decimal('rate_march', 5, 2)->default(1.0);
            $table->decimal('rate_loot', 5, 2)->default(1.0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('realms');
    }
};
