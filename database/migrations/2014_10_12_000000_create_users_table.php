<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('user_id')->primary();
            $table->integer('tree_sponsor')->default(1);
            $table->integer('code_tree_lider');
            $table->integer('code_tree_sponsor');
            $table->integer('range');
            $table->integer('range_tree')->default(1);
            $table->string('state');
            $table->string('sponsor_id');
            $table->string('name');
            $table->string('lastname');
            $table->string('username');
            $table->integer('rol')->default(0);
            $table->string('email')->unique();
            $table->string('document')->unique();
            $table->string('telephone')->unique();
            $table->integer('refer_by_admin')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
