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
        if (! Schema::hasTable('faq_translations')) {
            Schema::create('faq_translations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('faq_id')->constrained('faqs')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('locale', 20);
                $table->string('question', 255);
                $table->text('answer');
                $table->unique(['faq_id', 'locale']);
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
        Schema::dropIfExists('faq_translations');
    }
};
