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
        if (! Schema::hasTable('restaurant_translations')) {
            Schema::create('restaurant_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('restaurant_id')->constrained('restaurants')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('name', 127)->unique();
                $table->text('description');
                $table->string('address', 255);
                $table->text('information')->nullable();
                $table->unique(['locale', 'name']);
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
        Schema::dropIfExists('restaurant_translations');
    }
};
