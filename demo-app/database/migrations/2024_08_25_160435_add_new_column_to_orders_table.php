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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->bigInteger("orderNumber")->unique(); // Assume it to be primary key of this table intead of ID 
            $table->date("orderDate");
            $table->date("requiredDate");
            $table->string("status");
            $table->date("shippedDate")->nullable();
            $table->string("comments")->nullable();            
            $table->integer("customerNumber");
            $table->foreign('customerNumber')->references('customerNumber')->on('customers')->onDelete('cascade')->onUpdate("cascade");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
