<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropUnique('users_email_unique');
            $table->renameColumn('email', 'login');
            $table->unique('login');
        });
        Schema::table('users', function(Blueprint $table)
        {
            $table->string('email');
        });
        \DB::statement('UPDATE users SET email=login');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('email');
            $table->dropUnique('users_login_unique');
            $table->renameColumn('login', 'email');
            $table->unique('email');
        });
    }
}
