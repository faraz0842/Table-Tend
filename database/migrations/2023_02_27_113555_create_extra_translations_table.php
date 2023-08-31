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
        if (! Schema::hasTable('extra_translations')) {
            Schema::create('extra_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('extra_id')->constrained('extras')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('name', 127)->unique();
                $table->text('description')->nullable();
                $table->unique(['extra_id', 'locale']);
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
        Schema::dropIfExists('extra_translations');
    }
};
