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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();

            $table->string('name', 200);
            $table->text('description')->nullable();
            $table->tinyInteger('strength');
            $table->tinyInteger('intelligence');
            $table->tinyInteger('defence');
            $table->tinyInteger('speed');
            $table->tinyInteger('life')->unsigned();

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
        Schema::dropIfExists('characters');
    }
};
