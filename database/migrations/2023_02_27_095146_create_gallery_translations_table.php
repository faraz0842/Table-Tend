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
        if (! Schema::hasTable('gallery_translations')) {
            Schema::create('gallery_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('gallery_id')->constrained('galleries')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->text('description');
                $table->unique(['gallery_id', 'locale']);
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
        Schema::dropIfExists('gallery_translations');
    }
};
