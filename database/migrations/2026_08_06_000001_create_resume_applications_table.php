<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resume_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('position')->nullable();
            $table->text('message')->nullable();
            $table->string('resume_path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resume_applications');
    }
};
