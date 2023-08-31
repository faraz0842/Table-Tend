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
        if (! Schema::hasTable('extras')) {
            Schema::create('extras', function (Blueprint $table) {
                $table->id();
                $table->foreignId('food_id')->constrained('foods')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('extra_group_id')->constrained('extra_groups')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('slug', 255)->unique();
                $table->double('price', 8, 2)->nullable()->default(0);
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
        Schema::dropIfExists('extras');
    }
};
