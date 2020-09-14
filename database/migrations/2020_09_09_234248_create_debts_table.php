<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->string('cod');
            $table->string('name');
            $table->date('date');
            $table->decimal('total_value', 8, 2);
            $table->decimal('single_value', 8, 2);
            $table->timestamps();

            $table->foreignId('creator_id')->constrained('users');
            $table->foreignId('debtor_id')->constrained('users');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debts');
    }
}
