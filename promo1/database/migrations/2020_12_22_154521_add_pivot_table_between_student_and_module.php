<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPivotTableBetweenStudentAndModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_student', function (Blueprint $table) {
            $table->id();

            $table->integer("student_id");
            $table->integer("module_id");

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
        Schema::dropIfExists('pivot_student_modules');
        Schema::dropIfExists('student_module');
        Schema::dropIfExists('module_student');
    }
}
