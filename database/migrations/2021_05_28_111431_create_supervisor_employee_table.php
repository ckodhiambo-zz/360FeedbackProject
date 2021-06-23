<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorEmployeeTable extends Migration
{
    public function up()
    {
        Schema::create('employee_supervisor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supervisor_id');
            $table->foreignId('employee_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('supervisor_employee');
    }
}
