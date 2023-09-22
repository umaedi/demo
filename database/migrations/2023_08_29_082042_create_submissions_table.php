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
            $table->integer('reviewer_id')->nullable();
            $table->string('registrasi_id');
            $table->string('title');
            $table->text('abstract');
            $table->string('keyword');
            $table->string('topic');
            $table->string('abstract_file');
            $table->string('rev_abstract_file')->nullable();
            $table->string('paper')->nullable();
            $table->string('rev_paper')->nullable();
            $table->string('ppt')->nullable();
            $table->integer('status')->nullable();
            $table->string('message')->nullable();
            $table->string('comment')->nullable();
            $table->integer('histories')->default(1);
            $table->boolean('acc')->nullable();
            $table->string('loa')->nullable();
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
