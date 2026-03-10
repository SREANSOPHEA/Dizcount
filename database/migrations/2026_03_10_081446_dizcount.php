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
            $table->id();
            $table->string('username', 50)->unique();
            $table->string('email', 100);
            $table->text('password');
            $table->enum('role', ['admin', 'seller', 'customer', 'guest']);
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('phone', 20)->unique();
            $table->string('telegram', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('location');
            $table->text('logo_url')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('telegram', 100)->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade');
            $table->enum('platform', ['Facebook', 'Instagram', 'TikTok', 'Other']);
            $table->string('url', 255);
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade');
            $table->string('purchase_item', 100);
            $table->integer('purchase_quantity');
            $table->decimal('price', 10, 2);
            $table->string('title', 200);
            $table->text('description')->nullable();
            $table->integer('viewer')->default(0);
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->enum('discount_type', ['percentage', 'free_item']);
            $table->enum('status', ['active', 'inactive', 'expired', 'draft'])->default('draft');
            $table->timestamps();
        });

        Schema::create('post_detail_percentages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            $table->float('discount');
            $table->timestamps();
        });

        Schema::create('post_detail_frees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            $table->string('free_item', 255);
            $table->integer('free_quantity');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('shops');
        Schema::dropIfExists('social_media');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_detail_percentages');
        Schema::dropIfExists('post_detail_frees');
    }
};
