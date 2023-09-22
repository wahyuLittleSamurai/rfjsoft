<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Detailcompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailcompany', function (Blueprint $table) {
            $table->string('Kode');
            $table->string('KodeCompany');
            $table->string('Name');
            $table->string('Icon');
            $table->string('Link');
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
