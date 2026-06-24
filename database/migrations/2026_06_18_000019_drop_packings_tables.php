<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('product_packing');
        Schema::dropIfExists('packings');
    }

    public function down(): void
    {
        Schema::create('packings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('product_packing', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('packing_id')->constrained()->cascadeOnDelete();
            $table->primary(['product_id', 'packing_id']);
        });
    }
};
