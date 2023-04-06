<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('payment_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bank_account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('paypal_email')->nullable();
            $table->string('upi_mobile_number')->nullable();
            $table->string('upi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
