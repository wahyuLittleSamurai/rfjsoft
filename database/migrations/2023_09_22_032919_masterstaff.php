<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Masterstaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterstaff', function (Blueprint $table) {
            $table->string('Kode');
            $table->string('StaffName');
            $table->string('Phone');
            $table->string('Email');
            $table->string('Address');
            $table->string('Photo');
            $table->string('Position');
            $table->boolean('IsActive')->default(true);
            $table->string('CreateBy')->default('ADMIN');
            $table->timestamp('CreateDate')->useCurrent();
            $table->string('Operator')->default('ADMIN');
            $table->timestamp('TglEntry')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
