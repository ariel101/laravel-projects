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
        Schema::table('Users', function (Blueprint $table) {
            //
            $table->tinyInteger('nivel')->default(1)->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Users', function (Blueprint $table) {
            //
            $table->dropColumn('nivel');
        });
    }
};
