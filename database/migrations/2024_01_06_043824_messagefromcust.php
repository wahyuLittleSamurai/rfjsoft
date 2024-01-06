<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Messagefromcust extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagefromcust', function (Blueprint $table) {
            $table->string('Kode');
            $table->string('CustName');
            $table->string('EmailCust');
            $table->string('SubjectCust');
            $table->string('Message');
            $table->timestamp('CreateDate')->useCurrent();
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
