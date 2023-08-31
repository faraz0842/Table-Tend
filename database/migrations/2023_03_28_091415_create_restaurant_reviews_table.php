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
        if (!Schema::hasTable('restaurant_reviews')) {
            Schema::create('restaurant_reviews', function (Blueprint $table) {
                $table->id();
                $table->uuid('uuid')->nullable();
                $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('restaurant_id')->constrained('restaurants')->cascadeOnUpdate()->cascadeOnDelete();
                $table->text('review')->nullable();
                $table->unsignedTinyInteger('rate')->default(0);
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
        Schema::dropIfExists('restaurant_reviews');
    }
};
