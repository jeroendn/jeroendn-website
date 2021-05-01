<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->text('description')->nullable();
            $table->boolean('show')->default(false);
            $table->timestamps();
        });

        DB::table('projects')->insert([
            ['name' => 'Bladerblokken', 'url' => 'https://jeroendn.nl/project/bladerblokken/index.html', 'description' => NULL, 'show' => false, 'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'Nepflix', 'url' => 'https://jeroendn.nl/project/nepflix/login/index.php', 'description' => NULL, 'show' => true, 'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'Webshop', 'url' => 'https://jeroendn.nl/project/snoepwinkel', 'description' => NULL, 'show' => true, 'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'CloudStorage', 'url' => 'https://jeroendn.nl/cloudstorage', 'description' => NULL, 'show' => true, 'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'SocialMedia', 'url' => 'https://jeroendn.nl/project/socialmedia', 'description' => NULL, 'show' => true, 'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'GarageApplicatie', 'url' => 'https://jeroendn.nl/project/garageochten', 'description' => NULL, 'show' => true, 'created_at' => date("Y-m-d H:i:s")]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
