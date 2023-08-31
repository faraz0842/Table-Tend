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
        if (! Schema::hasTable('extra_group_translations')) {
            Schema::create('extra_group_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('extra_group_id')->constrained('extra_groups')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('name', 127)->unique();
                $table->unique(['extra_group_id', 'locale']);
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
        Schema::dropIfExists('extra_group_translations');
    }
};
