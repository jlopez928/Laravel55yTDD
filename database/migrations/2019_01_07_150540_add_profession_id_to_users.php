<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfessionIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profession');
            $table->unsignedInteger('profession_id')->after('password')->nullable();
            $table->foreign('profession_id')->references('id')->on('professions');
            //$table->integer('profession_id')->unsigned();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('profession_id');
            $table->dropColumn('profession_id');
            $table->string('profession', 50)->nullable()->after('password');
        }); 
    }
}