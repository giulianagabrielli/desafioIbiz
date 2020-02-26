<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Access_level;


class CreateAccessLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('access_level');
            $table->timestamps();
        });

        Access_level::insert([
            ['access_level' => 'administrador'],
            ['access_level' => 'gerente'],
            ['access_level' => 'consultor']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_levels');
    }
}
