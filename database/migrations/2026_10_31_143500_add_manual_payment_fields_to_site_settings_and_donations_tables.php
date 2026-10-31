<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('payment_bkash')->nullable()->after('donate_image');
            $table->string('payment_nagad')->nullable()->after('payment_bkash');
            $table->string('payment_rocket')->nullable()->after('payment_nagad');
            $table->string('payment_upay')->nullable()->after('payment_rocket');
            $table->string('payment_note')->nullable()->after('payment_upay');
        });

        Schema::table('donations', function (Blueprint $table) {
            $table->string('payment_method')->nullable()->after('amount');
            $table->string('transaction_id')->nullable()->after('payment_method');
            $table->string('currency', 3)->default('BDT')->after('transaction_id');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'payment_bkash',
                'payment_nagad',
                'payment_rocket',
                'payment_upay',
                'payment_note',
            ]);
        });

        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'transaction_id', 'currency']);
        });
    }
};
