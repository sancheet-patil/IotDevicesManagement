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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->index('user_id');
            $table->string('device_name');
            $table->string('serial_no');
            $table->string('equipment_serial_no');
            $table->string('plant_location');
            $table->string('filepath');
            $table->string('company_name');
            $table->integer('data_push_rate');
            $table->foreignId('user_id')->constrained('users');
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
        $table->dropForeign('devices_user_id_foreign');
        $table->dropColumn('user_id');
        Schema::dropIfExists('devices');
    }
};
