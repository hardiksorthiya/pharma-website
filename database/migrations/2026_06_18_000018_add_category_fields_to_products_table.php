<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('product_category_id')
                ->nullable()
                ->after('sku')
                ->constrained('product_categories')
                ->nullOnDelete();

            $table->foreignId('product_sub_category_id')
                ->nullable()
                ->after('product_category_id')
                ->constrained('product_sub_categories')
                ->nullOnDelete();
        });

        $pivotRows = DB::table('product_product_category')
            ->select('product_id', DB::raw('MIN(product_category_id) as product_category_id'))
            ->groupBy('product_id')
            ->get();

        foreach ($pivotRows as $row) {
            DB::table('products')
                ->where('id', $row->product_id)
                ->whereNull('product_category_id')
                ->update(['product_category_id' => $row->product_category_id]);
        }
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropConstrainedForeignId('product_sub_category_id');
            $table->dropConstrainedForeignId('product_category_id');
        });
    }
};
