<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiderTreeRanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lider_tree_ranges', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('tree');
            $table->integer('range');
            $table->integer('code');
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
        Schema::dropIfExists('lider_tree_ranges');
    }
}
