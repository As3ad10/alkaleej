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
        Schema::create('payment_request_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color')->default('#fefefe');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        DB::table('payment_request_statuses')->insert([
            ['name' => 'جديدة', 'status' => true],
            ['name' => 'قيد التواصل', 'status' => true],
            ['name' => 'مكتملة', 'status' => true],
            ['name' => 'ملغية', 'status' => true],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_request_statuses');
    }
};