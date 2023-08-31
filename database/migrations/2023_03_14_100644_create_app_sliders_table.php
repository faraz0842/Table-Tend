<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (!Schema::hasTable('app_sliders')) {
            Schema::create('app_sliders', function (Blueprint $table) {
                $table->id();
                $table->string('slug', 255)->unique();
                $table->foreignId('food_id')->constrained('foods')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('restaurant_id')->constrained('restaurants')->cascadeOnUpdate()->cascadeOnDelete();
                $table->integer('order')->unsigned()->default(0)->nullable();
                $table->string('text_position', 50)->default('start')->nullable();
                $table->string('text_color', 36)->nullable();
                $table->string('button_color', 36)->nullable();
                $table->string('background_color', 36)->nullable();
                $table->string('indicator_color', 36)->nullable();
                $table->string('image_fit', 50)->default('cover')->nullable();
                $table->boolean('enabled')->default(1)->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('app_sliders');
    }
};
