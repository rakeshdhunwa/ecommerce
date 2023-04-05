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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->string('show_in_menu');
            $table->string('parent_id');
            $table->string('short_description');
            $table->string('description');
            $table->string('thumbnail_image');
            $table->string('banner_image');
            $table->tinyInteger('is_featured');
            $table->string('url_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
