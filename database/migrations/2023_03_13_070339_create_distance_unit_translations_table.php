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
        if (! Schema::hasTable('distance_unit_translations')) {
            Schema::create('distance_unit_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('distance_unit_id')->constrained('distance_units')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('name', 127)->unique();
                $table->unique(['distance_unit_id', 'locale']);
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
        Schema::dropIfExists('distance_unit_translations');
    }
};
