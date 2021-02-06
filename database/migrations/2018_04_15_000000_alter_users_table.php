<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('username')->after('id');
            $table->text('avatar')->nullable()->after('remember_token');
            $table->boolean('is_admin')->after('avatar')->default(false);
            $table->unsignedInteger('domain_id')->after('is_admin');
            $table->unsignedInteger('last_domain_id')->after('domain_id')->nullable();
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
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('is_admin');
            $table->dropColumn('domain_id');
            $table->dropColumn('last_domain_id');
        });
    }
}
