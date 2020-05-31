<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username');
            $table->string('phone');
            $table->string('ref_code');
            $table->string('pin_trx');
            $table->string('ref_parent');

        });

        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->integer('upline_id')->unsigned();
            $table->integer('upline_id')->nullable()->change();
            $table->string('voucher_code');
            $table->integer('claim_id')->unsigned();
            $table->integer('claim_id')->nullable()->change();
            $table->timestamps();
        });

        Schema::create('point_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('point_type_id')->unsigned();
            $table->decimal('balance', 15,2);
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('phone');
            $table->dropColumn('ref_code');
            $table->dropColumn('pin_trx');
            $table->dropColumn('ref_parent');
        });

        Schema::dropIfExists('vouchers');
        Schema::dropIfExists('point_type');
        Schema::dropIfExists('wallets');

    }
}
