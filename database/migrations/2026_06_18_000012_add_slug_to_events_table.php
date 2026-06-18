<?php

use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        Event::query()->each(function (Event $event) {
            $baseSlug = Str::slug($event->title) ?: 'event';
            $event->update(['slug' => $baseSlug.'-'.$event->id]);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
