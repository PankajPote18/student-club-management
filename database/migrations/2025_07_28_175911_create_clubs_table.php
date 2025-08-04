<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('type', 100);
            $table->string('president_name', 255)->nullable();
            $table->unsignedInteger('members_count')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
  
    public function down()
    {
        Schema::dropIfExists('clubs');
    }
}
