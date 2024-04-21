<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kpays', function (Blueprint $table) {
            $table->id('kpay_id');
            $table->string('user_id');
            $table->string('image');
            $table->longText('old_money')->nullable(true);
            $table->longText('new_money');
            $table->longText('current_money')->nullable(true);

            $table->string('description')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpays');
    }
};
