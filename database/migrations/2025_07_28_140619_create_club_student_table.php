<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubStudentTable extends Migration
{
    
    public function up()
    {
        Schema::create('club_student', function (Blueprint $table) {
            $table->foreignId('club_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['club_id', 'student_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('club_student');
    }
}
