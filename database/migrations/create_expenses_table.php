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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id('id_expense');
            $table->decimal('amount', 8, 2);
            $table->date('date');
            $table->timestamp('created_at')->useCurrent();
            $table->string('description', 255)->nullable();
            $table->string('name_expense');
            $table->string('ref_expense')->unique();
            // $table->unsignedBigInteger('id_cicilan')->nullable();
            // $table->foreign('id_cicilan')->references('id_cicilan')->on('cicilan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
