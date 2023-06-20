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
        Schema::create('observations', function (Blueprint $table) {
            $table->id();
            $table->text('observations');
            $table->text('observations2')->nullable();
            $table->text('observations3')->nullable();
            $table->string('tecnico1')->nullable();
            $table->string('tecnico2')->nullable();
          //  $table->timestamp('envio')->nullable();
          //  $table->timestamp('recepcion')->nullable();
            $table->timestamp('entrega')->nullable();

            
            $table->unsignedBigInteger('elemento_id');
           // $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('elemento_id')->references('id')->on('elementos')->onDelete('cascade');
           // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observations');
    }
};
