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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id('id_income');
            $table->decimal('amount', 8, 2);
            $table->date('date');
            $table->timestamp('created_at')->useCurrent();
            $table->string('description', 255)->nullable();
            $table->string('name_income');
            // $table->unsignedBigInteger('id_cicilan');
            // $table->foreign('id_cicilan')->references('id_cicilan')->on('cicilan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
