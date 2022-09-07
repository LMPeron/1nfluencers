<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->string('main');
            $table->string('description');
            $table->number('lon');
            $table->number('lat');
            $table->number('temp');
            $table->number('temp_min');
            $table->number('temp_max');
            $table->number('feels_Like');
            $table->number('pressure');
            $table->number('humididty');
            $table->number('sea_level');
            $table->number('grnd_level');
            $table->number('visibility');
            $table->number('wind_speed');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weather');
    }
};
