<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoginAtToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function($table)
        {
            $table->dateTime('login_at')->nullable()->after('remember_token');  
            $table->dateTime('logout_at')->nullable()->after('login_at'); 
            $table->string('login_token', 32)->nullable()->after('logout_at'); 
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
        Schema::table('users', function($table)
        {   
            $table->dropColumn(['login_at', 'logout_at', 'login_token']);
        });
    }
}
