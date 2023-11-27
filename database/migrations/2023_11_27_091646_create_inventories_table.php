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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->enum('computer_unit',['Unit1','Unit2','Unit3','Unit4','Unit5']);
            $table->enum('category',['RAM','SSD','HDD','PSU','CPU','CPU_COOLER','MOTHER_BOARD','COMPUTER_CASE','EXPANSION_CARDS','SPEAKER','KEYBOARD','MONITOR','MOUSE']);
            $table->bigInteger('quantity')->unsigned();
            $table->enum('status',['damage','working']);
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
