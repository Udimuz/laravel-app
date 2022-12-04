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
		Schema::create('articles', function (Blueprint $table) {
			// создан id - На самом деле это Алиас, т.е. сокращенная запись:
			$table->id();
			// На самом деле мы это могли по-другому записать следующим образом:
			//$table->bigIncrements('id');	// что тоже является Алиасом
			// Мы создаём 2 текстовых поля, которые будут уникальные, т.е. в нём нельзя будет создать повторяющиеся записи:
			$table->string('title')->unique();
			$table->string('slug')->unique();
			// Создаём 'body' в нём будет храниться текст:
			$table->text('body');
			// Путь к фотографии будет храниться в виде строчки:
			$table->string('img');
			$table->timestamp('published_at');
			$table->timestamps();
			// Используя строчку "timestamps" у таблицы будет создано 2 поля:
			// created_at и updated_at
			// В эти поля записывается время когда она была создана и когда изменена
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down() {
		Schema::dropIfExists('articles');
	}
};
