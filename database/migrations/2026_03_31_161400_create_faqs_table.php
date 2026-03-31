<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faqs', static function (Blueprint $table): void {
            $table->id();
            $table->boolean('is_active')
                ->default(true)
                ->unsigned()
                ->index();
            $table->string('name');
            $table->string('slug')
                ->unique()
                ->index();
            $table->text('description')
                ->nullable();
            $table->integer('sort')
                ->unsigned()
                ->index()
                ->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
