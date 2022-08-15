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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id('equipment_id');
            $table->string('equipment_name',15);
            $table->bigInteger('categories_id')->unsigned()->nullable();
            $table->string('equipment_address',50);
            $table->date('buy_date');
            $table->integer('qty');
            $table->tinyInteger('stetus')->default(0);
            $table->timestamps();
            $table->foreign('categories_id')->references('categories_id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }
};
