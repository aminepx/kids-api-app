<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_urls', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('audio')->nullable();

            $table->unsignedBigInteger('audio_id');
            $table->foreign('audio_id')->references('id')->on('audio')->onDelete('cascade');
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
        Schema::dropIfExists('audio_urls');
    }
}
