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
        if (! Schema::hasTable('mass_unit_translations')) {
            Schema::create('mass_unit_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('mass_unit_id')->constrained('mass_units')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('short_form', 10)->unique();
                $table->string('full_form', 20)->unique();
                $table->unique(['mass_unit_id', 'locale']);
                $table->unique(['locale', 'short_form']);
                $table->unique(['locale', 'full_form']);
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
        Schema::dropIfExists('mass_unit_translations');
    }
};
