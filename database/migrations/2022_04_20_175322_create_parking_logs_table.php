<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parking_id')->nullable();
            $table->foreignId('vehicle_id')->nullable();
            $table->time('login_time');
            $table->date('login_date');
            $table->time('logout_time');
            $table->date('logout_date');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('parking_logs');
    }
}
