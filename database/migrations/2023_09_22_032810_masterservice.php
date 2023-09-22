<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Masterservice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterservice', function (Blueprint $table) {
            $table->string('Kode');
            $table->string('ServiceName');
            $table->string('DetailService');
            $table->string('TagLine');
            $table->string('Icon');
            $table->string('LinkDetail');
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
