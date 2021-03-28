<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListDonationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_donation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table ->string('furniture')->nullable();
            $table ->string('clothes')->nullable();
            $table ->string('dishes')->nullable();
            $table ->string('electrical_tools')->nullable();
            $table ->string('baby_things')->nullable();
            $table ->string('luxuries')->nullable();
            $table ->string('accessories_and_mobiles')->nullable();
            $table ->string('medical_devices')->nullable();
            $table ->string('miscellaneous')->nullable();
           // $table ->datetime('birth_date');
             
            


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
        Schema::dropIfExists('list_donation');
    }
}
