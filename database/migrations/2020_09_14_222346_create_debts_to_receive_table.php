<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtsToReceiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('debts_to_receive', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->decimal('value', 8, 2);
            $table->timestamps();

            $table->foreignId('creator_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debts_to_receive');
    }
}
