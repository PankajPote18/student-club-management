<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('student_id', 50)->unique();
            $table->string('email', 255)->unique();
            $table->string('phone', 20);
            $table->string('department', 100);
            $table->string('year', 20);
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->text('interests')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
