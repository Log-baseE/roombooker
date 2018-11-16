<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('id')->change();
            $table->string('phone');
            $table->boolean('active');
            $table->unsignedInteger('role_id');
            $table->string('public_key');
            $table->string('private_key');
            $table->boolean('verified');
            $table->longText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->dropColumn('phone');
            $table->dropColumn('active');
            $table->dropColumn('role_id');
            $table->dropColumn('public_key');
            $table->dropColumn('private_key');
            $table->dropColumn('verified');
            $table->dropColumn('description');
        });
    }
}
