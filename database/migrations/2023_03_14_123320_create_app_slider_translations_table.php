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
        if (!Schema::hasTable('app_slider_translations')) {
            Schema::create('app_slider_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('app_slider_id')->constrained('app_sliders')->cascadeOnDelete()->cascadeOnUpdate();
                $table->string('locale', 20);
                $table->string('text', 50)->nullable();
                $table->string('button', 50)->nullable();
                $table->unique(['app_slider_id', 'locale']);
                $table->unique(['text', 'button']);
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
        Schema::dropIfExists('app_slider_translations');
    }
};
