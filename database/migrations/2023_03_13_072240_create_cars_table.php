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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name_car');//loại xe
            $table->string('vehicles');//dòng xe detail
            $table->integer('seat');//chỗ ngồi
            $table->string('distance');//quãng đường detail
            $table->string('content');
            $table->unsignedBigInteger('price');
            $table->string('image');
          

            $table->string('image_detail');//detail
            $table->integer('maximum');
            $table->integer('maximum_torque');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
