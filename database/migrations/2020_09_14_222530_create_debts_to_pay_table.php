<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtsToPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts_to_pay', function (Blueprint $table) {
            $table->id();
            $table->decimal('value', 8, 2);
            $table->timestamps();

            $table->foreignId('debtor_id')->constrained('users');
            $table->foreignId('debt_id')->constrained('debts_to_receive');
        });;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debts_to_pay');
    }
}
