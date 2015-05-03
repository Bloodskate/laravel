<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($t){
			$t->increments('id');
			$t->string('email',50);
			$t->string('username',30);
			$t->string('password',60);
			$t->string('password_temp',60);
			$t->string('code',60);
			$t->string('name',100);
			$t->integer('active');
			$t->timestamps();
			$t->string('remember_token',60);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
