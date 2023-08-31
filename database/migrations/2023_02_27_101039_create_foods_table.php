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
        if (! Schema::hasTable('foods')) {
            Schema::create('foods', function (Blueprint $table) {
                $table->id();
                $table->foreignId('restaurant_id')->constrained('restaurants')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('category_id')->constrained('categories')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('slug', 255)->unique();
                $table->double('price', 8, 2);
                $table->double('discount_price', 8, 2)->default(0);
                $table->unsignedSmallInteger('package_count');
                $table->unsignedSmallInteger('weight');
                $table->foreignId('unit_id')->constrained('mass_units')->cascadeOnUpdate()->cascadeOnDelete();
                $table->boolean('featured')->default(0);
                $table->boolean('deliverable')->default(0);
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
        Schema::dropIfExists('foods');
    }
};
