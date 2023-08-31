<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        if (! Schema::hasTable('food_translations')) {
            Schema::create('food_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('food_id')->constrained('foods')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('name', 127);
                $table->text('description')->nullable();
                $table->text('ingredients')->nullable();
                $table->unique(['food_id', 'locale']);
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
        Schema::dropIfExists('food_translations');
    }
};
