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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id('borrow_id');
            $table->bigInteger('equipment_id')->unsigned()->nullable();
            $table->string('equipment_name')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->date('borrow_date');
            $table->date('remand_date');
            $table->tinyInteger('approve');
            $table->tinyInteger('stetus');
            $table->timestamps();
            $table->foreign('equipment_id')->references('equipment_id')->on('equipment')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowings');
    }
};
