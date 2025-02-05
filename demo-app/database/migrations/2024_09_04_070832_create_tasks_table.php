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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

        $table->string('title');
        $table->text('description')->nullable();
        $table->unsignedBigInteger('assigned_to')->nullable(); // Foreign key to users table
        $table->unsignedBigInteger('created_by'); // Foreign key to users table
        $table->boolean('completed')->default(false);

        $table->timestamps();

        $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
