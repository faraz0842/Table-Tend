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
        if (! Schema::hasTable('discount_type_translations')) {
            Schema::create('discount_type_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('discount_type_id')->constrained('discount_types')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('name', 127);
                $table->unique(['discount_type_id', 'locale']);
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
        Schema::dropIfExists('discount_type_translations');
    }
};
