<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddSponsorIdToInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('add_sponsor_id_to_invoices', function (Blueprint $table) {
            $table->integer('sponsor_id')->after('user_id'); //just add this line
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('add_sponsor_id_to_invoices', function (Blueprint $table) {
            $table->dropColumn('sponsor_id');
        });
    }
}
