<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_hp');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('expired_user')->nullable()->default(null);
            $table->string('api_token')->nullable();
            $table->timestamp('expired_token')->nullable()->default(null);
            $table->integer('type_account');
            $table->integer('type_user');
            $table->string('foto_profil')->nullable();
            $table->string('type_login')->nullable();
            $table->string('versi');
            $table->double('saldo');
            $table->double('saldo_referral');
            $table->double('storage_size');
            $table->string('status_hp');
            $table->string('device_name');
            $table->string('device_type');
            $table->string('os_version');
            $table->timestamp('delete_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
