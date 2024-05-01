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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('prename')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('postname')->nullable();
            $table->string('sinta')->nullable();
            $table->string('s1')->nullable();
            $table->string('s2')->nullable();
            $table->string('s3')->nullable();
            $table->string('email')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('fungsional')->nullable();
            $table->text('project')->nullable();
            $table->longText('publication')->nullable();
            $table->text('hki')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('status')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
