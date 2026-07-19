<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('users')->where('role_id', 2)->update(['role_id' => 3]);
        DB::table('user_roles')->where('id', 2)->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Downgraded users cannot be identified anymore, so only the role itself is restored
        DB::table('user_roles')->insert(['id' => 2, 'name' => 'Premium User']);
    }
};
