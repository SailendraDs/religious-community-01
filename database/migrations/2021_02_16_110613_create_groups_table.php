<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('cid');
            $table->longText('description');
            $table->string('location');
            $table->longText('photo')->nullable();
            $table->longText('cover')->nullable();
            $table->bigInteger('owner_id')->nullable();
            $table->longText('admins')->nullable();
            $table->longText('mods')->nullable();
            $table->boolean('join_approval')->default(0);
            $table->boolean('post_approval')->default(0);
            $table->boolean('private')->default(0);
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
        Schema::dropIfExists('groups');
    }
}