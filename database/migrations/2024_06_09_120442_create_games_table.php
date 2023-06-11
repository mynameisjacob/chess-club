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
        if(!Schema::hasTable('games')){
            Schema::create('games', function (Blueprint $table) {
                $table->id('id');
                $table->unsignedBigInteger('white');
                $table->unsignedBigInteger('black');
                $table->unsignedBigInteger('winner')->nullable();
                $table->integer('wmoves')->nullable();
                $table->integer('bmoves')->nullable();
                $table->date('date');
                $table->timestamps();
                $table->foreign('white')->references('id')->on('members');
                $table->foreign('black')->references('id')->on('members');
                $table->foreign('winner')->references('id')->on('members');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
