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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('qrcode');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('salutation');
            $table->enum('gender', ['L', 'P'])->default('L');;
            $table->string('institution');
            $table->string('country');
            $table->string('no_tlp');
            $table->string('type_user')->default('participan');
            $table->string('level')->default('user');
            $table->string('status')->default('0');
            $table->string('sertifikat')->nullable();
            $table->string('img')->default('avatar.png');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
