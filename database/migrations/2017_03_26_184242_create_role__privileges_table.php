<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_privileges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_role')->unsigned();
            $table->foreign('id_role')->references('id')->on('roles');
            $table->integer('id_privilege')->unsigned();
            $table->foreign('id_privilege')->references('id')->on('privileges');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_privileges');
    }
}
