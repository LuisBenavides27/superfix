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
        Schema::create('elementos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('mark');
            $table->integer('active')->unique()->nullable();
            $table->string('serial')->unique()->nullable();
            $table->enum('status',[1,2,3])->default(1);
            $table->string('transport')->nullable();
            $table->string('guide')->nullable();
            $table->string('zone');
          //  $table->timestamp('envio')->nullable();
           // $table->timestamp('entrega')->nullable();

            $table->unsignedBigInteger('centro_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('centro_id')->references('id')->on('centros')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos');
    }
};
