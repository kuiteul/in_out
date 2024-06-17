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
        Schema::create('employees', function(Blueprint $table) {
            $table->uuid('employee_id')->primary();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->integer('telephone')->unique();
            $table->foreignUuid('service_id')
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
