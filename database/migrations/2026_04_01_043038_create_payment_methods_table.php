<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color')->default('#fefefe');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        DB::table('payment_methods')->insert([
            ['name' => 'تحويل بنكي / مصرفي', 'status' => true],
            ['name' => 'تامرا', 'status' => true],
            ['name' => 'تابي', 'status' => true],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};