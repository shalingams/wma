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
        Schema::table('users', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('nickname')->nullable();
            $table->date('dob')->nullable();
            $table->string('nic')->nullable();
            $table->string('residential_address')->nullable();
            $table->string('work_address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('work_contact')->nullable();
            $table->string('residence_contact')->nullable();
            $table->string('website')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('beneficiary')->nullable();
            $table->boolean('qrcode')->default(false);
            $table->string('role')->default('NonSubscriber');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('nickname');
            $table->dropColumn('dob');
            $table->dropColumn('nic');
            $table->dropColumn('residential_address');
            $table->dropColumn('work_address');
            $table->dropColumn('mobile');
            $table->dropColumn('work_contact');
            $table->dropColumn('residence_contact');
            $table->dropColumn('website');
            $table->dropColumn('marital_status');
            $table->dropColumn('beneficiary');
            $table->dropColumn('qrcode');
            $table->dropColumn('role');
        });

    }
};
