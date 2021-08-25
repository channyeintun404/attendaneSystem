<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
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
            $table->string('emp_name')->nullable();
            $table->string('emp_no')->nullable();
            $table->date('emp_joindate')->nullable();
            $table->string('emp_phno')->nullable();
            $table->string('emp_address')->nullable();
            $table->string('emp_position')->nullable();
            $table->string('emp_email')->unique()->nullable();
            $table->string('emp_nrc')->unique()->nullable();
            $table->string('emp_img')->nullable();
            $table->string('password')->nullable();
            $table->date('dateofbirth')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('delete_flag')->nullable();
            $table->timestamp('deleted_at')->nullable();  
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
}
