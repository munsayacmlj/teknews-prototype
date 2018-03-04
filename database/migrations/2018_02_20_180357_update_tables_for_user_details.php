<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTablesForUserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function(Blueprint $table) {
            $table->string('avatar')->nullable()->change();
            $table->integer('age')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('bio')->nullable()->change();
            $table->string('location')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function(Blueprint $table) {
            $table->string('avatar')->change();
            $table->integer('age')->change();
            $table->string('gender')->change();
            $table->string('bio')->change();
            $table->string('location')->change();
        });
    }
}
