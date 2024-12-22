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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name');
            $table->string('person_name');
            $table->string('phone_number1');
            $table->string('phone_number2')->nullable();
            $table->string('address');
            $table->string('has_shipping');//yes or no
            $table->string('category');//الفئة
            $table->string('evaluation');// التقييم
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
