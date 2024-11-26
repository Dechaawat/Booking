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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // เชื่อมกับตาราง users
            $table->string('category');  // ประเภทของการจอง (ห้องประชุม, โรงแรม ฯลฯ)
            $table->text('details');  // รายละเอียดการจอง
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');  // สถานะการจอง
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
