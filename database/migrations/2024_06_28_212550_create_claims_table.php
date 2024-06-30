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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('brand')->nullable();
            $table->string('engincapacity')->nullable();
            $table->string('releasedate')->nullable();
            $table->string('model')->nullable();
            $table->bigInteger('client')->unsigned();
            $table->boolean('active')->default(false);

            
            $table->foreign('client')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
