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
        Schema::create('room_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("room_id");
            $table->foreign("room_id")->references("room_id")->on("rooms")->onDelete("cascade");
            $table->foreign("room_id")->references("user_id")->on("users")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_histories');
    }
};
