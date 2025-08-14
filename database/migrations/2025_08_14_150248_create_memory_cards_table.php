<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('memory_cards', function (Blueprint $table) {
            $table->id();
            $table->string('marca', 100);
            $table->string('tipo', 50);
            $table->integer('capacidade');
            $table->decimal('preco', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('memory_cards');
    }
};
