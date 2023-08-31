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
        if (!Schema::hasTable('restaurant_cuisines')) {
            Schema::create('restaurant_cuisines', function (Blueprint $table) {
                $table->increments('id');
                $table->foreignId('restaurant_id')->constrained('restaurants')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('cuisine_id')->constrained('cuisines')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unique(['restaurant_id', 'cuisine_id']);
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
        Schema::dropIfExists('cuisine_restaurant');
    }
};
