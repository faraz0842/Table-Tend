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
        if (! Schema::hasTable('setting_type_translations')) {
            Schema::create('setting_type_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('setting_type_id')->constrained('setting_types')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('type', 50);
                $table->unique(['setting_type_id', 'locale']);
                $table->unique(['setting_type_id', 'locale', 'type']);
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
        Schema::dropIfExists('setting_type_translations');
    }
};
