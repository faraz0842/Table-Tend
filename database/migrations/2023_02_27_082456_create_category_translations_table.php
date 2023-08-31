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
        if (! Schema::hasTable('category_translations')) {
            Schema::create('category_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id')->constrained('categories')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('name', 127)->nullable();
                $table->text('description')->nullable();
                $table->unique(['category_id', 'locale']);
                $table->unique(['locale', 'name'])->whereNotNull('name');
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
        Schema::dropIfExists('category_translations');
    }
};
