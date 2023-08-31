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
        if (! Schema::hasTable('payment_method_translations')) {
            Schema::create('payment_method_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('payment_method_id')->constrained('payment_methods')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('name', 50)->unique();
                $table->unique(['payment_method_id', 'locale']);
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
        Schema::dropIfExists('payment_method_translations');
    }
};
