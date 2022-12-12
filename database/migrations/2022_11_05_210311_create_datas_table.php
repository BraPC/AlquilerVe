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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->date("date_born")->nullable();
            $table->integer("number_lincenc")->nullable()->unique();
            $table->date("venc_lincenc")->nullable();
            $table->string('lincenc_photo_path', 2048)->nullable();
            $table->timestamps();
            $table->foreignId('user_id') // UNSIGNED BIG INT
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
};
