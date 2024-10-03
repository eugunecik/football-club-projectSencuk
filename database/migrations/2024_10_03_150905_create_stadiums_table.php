<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stadiums', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->integer('capacity');
            $table->foreignId('team_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stadiums');
    }
};