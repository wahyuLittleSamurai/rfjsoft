<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mastertopbar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mastertopbar', function (Blueprint $table) {
            $table->string('Kode');
            $table->string('Menu');
            $table->string('Link');
            $table->string('Icon');
            $table->string('Isi');
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
