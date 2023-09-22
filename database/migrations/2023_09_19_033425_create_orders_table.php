<?php

use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignId('seller_id');
            $table->string('number', 16);
            $table->decimal('total_price', 10, 2);
            $table->enum('payment_status', ['1', '2', '3']);
            $table->string('payment_url')->nullable();
            $table->text('delivery_address')->nullable();
            $table->timestamps();

            // $table->foreign('user_id', 'userid_foreign')->references('id')->on('users');
            // $table->foreign('seller_id', 'sellerid_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
