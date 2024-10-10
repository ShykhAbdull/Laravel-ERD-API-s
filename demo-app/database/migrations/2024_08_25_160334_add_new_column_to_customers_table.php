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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->integer("customerNumber")->unique();
            $table->string("customerName", 100); 
            $table->string("contactLastName", 50);
            $table->string("contactFirstName", 50);
            $table->string("phone", 15); 
            $table->string("addressLine1", 100);
            $table->string("addressLine2", 100)->nullable();
            $table->string("city", 50);
            $table->string("state", 50)->nullable();
            $table->string("postalCode", 20);
            $table->string("country", 150);
            $table->integer("salesRepEmployeeNumber")->nullable();
            $table->foreign("salesRepEmployeeNumber")->references("employeeNumber")->on("employees")->onDelete("cascade")->onUpdate("cascade");
            $table->decimal("creditLimit", 10, 2)->nullable(); 
        
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
        Schema::dropIfExists('customers');
    }
};
