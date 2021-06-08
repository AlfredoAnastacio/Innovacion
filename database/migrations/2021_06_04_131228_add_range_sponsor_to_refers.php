<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRangeSponsorToRefers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('refers', function (Blueprint $table) {
            $table->integer('lider_id')->after('tree_sponsor')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('refers', function (Blueprint $table) {
            $table->dropColumn('lider_id');
        });
    }
}
