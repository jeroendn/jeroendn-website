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
    public function up(): void
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
            ['name' => 'Bladerblokken', 'url' => 'https://jeroendn.nl/project/bladerblokken/index.html', 'description' => null, 'show' => false, 'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'Nepflix', 'url' => 'https://jeroendn.nl/project/nepflix/login/index.php', 'description' => null, 'show' => true, 'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'Webshop', 'url' => 'https://jeroendn.nl/project/snoepwinkel/home', 'description' => null, 'show' => true, 'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'CloudStorage', 'url' => 'https://jeroendn.nl/cloudstorage/login', 'description' => null, 'show' => true, 'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'SocialMedia', 'url' => 'https://jeroendn.nl/project/socialmedia/login', 'description' => null, 'show' => true, 'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'Nepflix (Remastered)', 'url' => 'https://nu.jeroendn.nl', 'description' => null, 'show' => true, 'created_at' => date("Y-m-d H:i:s")],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
}
