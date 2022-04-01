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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->unsignedBigInteger('Fk_department');
            $table->unsignedBigInteger('Fk_designation');
            $table->string('Phone_number');
            $table->timestamps();
        });
        DB::table('users')->insert([
            ['Name' => 'Jhone Due','Fk_department' => 1,'Fk_designation' => 1,'Phone_number'=>'9633740021'],
            ['Name' => 'Tommy mark','Fk_department' => 2,'Fk_designation' => 2,'Phone_number'=>'7034509201'],
            ['Name' => 'Ani Ram','Fk_department' => 3,'Fk_designation' => 3,'Phone_number'=>'987453215'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
