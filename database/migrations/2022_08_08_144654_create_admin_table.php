<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('email',100);
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->string('telephone',10)->nullable();
            $table->string('username',30);
            $table->string('password');
            $table->timestamps();
            $table->foreign('department_id')->references('department_id')->on('department')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
