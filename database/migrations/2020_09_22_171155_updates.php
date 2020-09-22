<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Updates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suggestions', function (Blueprint $table) {
            $table->string('description_sug')->mediumText()->change();
        });

        DB::table('users')
              ->where('id', 2)
              ->update(['name' => 'KLB']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
