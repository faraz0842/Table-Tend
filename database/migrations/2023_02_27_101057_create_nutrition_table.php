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
        if (! Schema::hasTable('nutrition')) {
            Schema::create('nutrition', function (Blueprint $table) {
                $table->id();
                $table->string('slug', 255)->unique();
                $table->foreignId('food_id')->constrained('foods')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unsignedInteger('quantity')->default(0);
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
        Schema::dropIfExists('nutrition');
    }
};
