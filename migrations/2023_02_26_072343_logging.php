<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Logging extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logging', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('url');
            $table->string('ip');
            $table->string('file_parent');
            $table->string('file');
            $table->string('line');
            $table->string('function');
            $table->string('username')->nullable();
            $table->string('fullname')->nullable();
            $table->string('msg');
            $table->json('data')->nullable();
            $table->json('request_body')->nullable();
            $table->json('response')->nullable();
            $table->json('exception')->nullable();
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
        Schema::dropIfExists('logging');
    }
}
