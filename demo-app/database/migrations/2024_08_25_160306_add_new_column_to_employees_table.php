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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->integer("employeeNumber")->unique(); //Assume it to be primary key of this table intead of ID
            $table->string("firstName");
            $table->string("lastName");
            $table->integer("extension");
            $table->string("email");

            $table->string('officeCode');
            $table->foreign("officeCode")->references("officeCode")->on("offices")->onDelete("cascade")->onUpdate("cascade");
            
            $table->string("reportsTo")->nullable();

            $table->string("jobTitle");

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
        Schema::dropIfExists('employees');
    }
};
