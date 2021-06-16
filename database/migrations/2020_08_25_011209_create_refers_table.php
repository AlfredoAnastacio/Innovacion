<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('sponsor_id');
            $table->integer('refer_by_admin')->default(0);
            $table->integer('tree_sponsor')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refers');
    }
}
