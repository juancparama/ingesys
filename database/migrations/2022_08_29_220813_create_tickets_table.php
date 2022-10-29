<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('prior')->default(0);

            // status: 0 pendiente, 1 asignado, 2 completado.
            // $table->enum('status',[0, 1, 2])->default(0);
            $table->integer('status')->default(0);
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('type_id')->default(0)->nullable();
            $table->unsignedBigInteger('location_id');


            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

            $table->timestamps();
            
            $table->timestamp('closed_at')->nullable();
            $table->text('comment')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
