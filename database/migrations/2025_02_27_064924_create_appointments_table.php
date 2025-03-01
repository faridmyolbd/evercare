<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('uhid')->unique();
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->string('phone_number')->unique();
            $table->string('alternate_phone');
            $table->string('division');
            $table->string('district');
            $table->string('thana');
            $table->string('area');
            // $table->string('department');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->string('agent');
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
        Schema::dropIfExists('appointments');
    }
}
