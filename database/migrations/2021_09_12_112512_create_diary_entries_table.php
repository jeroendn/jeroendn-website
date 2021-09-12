<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaryEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diary_entries');
    }
}
