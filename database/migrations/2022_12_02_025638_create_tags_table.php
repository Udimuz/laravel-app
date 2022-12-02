<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up() {
		Schema::create('tags', function (Blueprint $table) {
			$table->id();
			// В Тегах у нас всего одно поле 'label':
			$table->string('label')->unique();	// Включить уникальность. Не может быть 2 статьи с одним и тем же названием
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down() {
		Schema::dropIfExists('tags');
	}
};
