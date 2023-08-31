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
        if (! Schema::hasTable('restaurants')) {
            Schema::create('restaurants', function (Blueprint $table) {
                $table->id();
                $table->string('slug', 255)->unique();
                $table->double('latitude', 12, 8);
                $table->double('longitude', 12, 8);
                $table->string('phone', 50);
                $table->string('mobile', 50)->nullable();
                $table->double('admin_commission', 8, 2)->default(0);
                $table->double('delivery_fee', 8, 2)->default(0);
                $table->double('delivery_range', 8, 2)->default(0);
                $table->double('default_tax', 8, 2)->default(0);
                $table->boolean('closed')->default(0);
                $table->boolean('active')->default(0);
                $table->boolean('availability_for_delivery')->default(0);
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
        Schema::dropIfExists('restaurants');
    }
};
