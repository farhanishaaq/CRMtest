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
        Schema::create('post_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('admin_id');


            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
            $table->text('file_name');
            $table->text('file_path');
            $table->text('file_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_files');
    }
};
