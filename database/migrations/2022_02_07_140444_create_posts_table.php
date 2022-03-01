<?php

declare(strict_types=1);

use App\Enums\PostStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->string('slug');
            $table->string('title');
            $table->string('description', 120);
            $table->mediumText('content');

            $table->string('status')->default(PostStatus::DRAFT->value);
            $table->boolean('approved')->default(false);

            $table->foreignId('user_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->index()->constrained()->cascadeOnDelete();

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
