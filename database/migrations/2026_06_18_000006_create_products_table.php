<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('cas_no')->nullable();
            $table->text('end_use')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('feature_image')->nullable();
            $table->timestamps();
        });

        Schema::create('product_product_category', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_category_id')->constrained()->cascadeOnDelete();
            $table->primary(['product_id', 'product_category_id']);
        });

        Schema::create('product_dosage_type', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('dosage_type_id')->constrained()->cascadeOnDelete();
            $table->primary(['product_id', 'dosage_type_id']);
        });

        Schema::create('product_therapeutic_class', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('therapeutic_class_id')->constrained()->cascadeOnDelete();
            $table->primary(['product_id', 'therapeutic_class_id']);
        });

        Schema::create('product_packing', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('packing_id')->constrained()->cascadeOnDelete();
            $table->primary(['product_id', 'packing_id']);
        });

        Schema::create('product_specification', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('specification_id')->constrained()->cascadeOnDelete();
            $table->primary(['product_id', 'specification_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_specification');
        Schema::dropIfExists('product_packing');
        Schema::dropIfExists('product_therapeutic_class');
        Schema::dropIfExists('product_dosage_type');
        Schema::dropIfExists('product_product_category');
        Schema::dropIfExists('products');
    }
};
