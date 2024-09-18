<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('body');
            $table->bigInteger('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('posts', function (Blueprint $table) {
            // Drop foreign key constraints if they exist
            $table->dropForeign(['user_id']);
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('posts');
    }
};