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
        Schema::create('course_histories', function (Blueprint $table) {
            $table->id('course_history_id');
            $table->integer('course_id');
            $table->integer('user_id');
            $table->longText('pay_by');
            $table->integer('get_point')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_histories');
    }
};
