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
        Schema::dropIfExists('diary_entries');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Entries cannot be restored, only the table itself is recreated
        Schema::create('diary_entries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('entry');
            $table->date('date')->nullable()->comment('Date of event');
            $table->date('date_approx_start')->nullable()->comment('Approximate start');
            $table->date('date_approx_end')->nullable()->comment('Approximate end');
            $table->timestamps();
        });
    }
};
