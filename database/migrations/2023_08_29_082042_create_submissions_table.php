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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('registrasi_id');
            $table->string('title');
            $table->text('abstract');
            $table->string('keyword');
            $table->string('topic');
            $table->string('paper');
            $table->string('started_on')->nullable();
            $table->string('end_on')->nullable();
            $table->string('status')->default('revised');
            $table->string('message')->nullable();
            $table->string('histories')->default('1');
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
        Schema::dropIfExists('submissions');
    }
};
