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
	public function up_old() {
		Schema::create('article_tag', function (Blueprint $table) {
			$table->id();	// Это поле тоже оказалось не нужно
			// Данная сводная таблица будет иметь 2 поля 'article_id' и 'tag_id'
			// Также в миграции добавлены внешние ключи на таблицы 'articles' и 'tags'
			$table->unsignedBigInteger('article_id');
			$table->foreign('article_id')->references('id')->on('articles');
			$table->unsignedBigInteger('tag_id');
			$table->foreign('tag_id')->references('id')->on('tags');
		});
	}
	public function up() {
		Schema::create('article_tag', function (Blueprint $table) {
			// Каждая такая конструкция заменяет 2 строчки:
			$table->foreignId('article_id')->constrained()->onDelete('cascade');
			$table->foreignId('tag_id')->constrained()->onDelete('cascade');
			// для связки с другими таблицами (чтобы грамотно удаляло записи  во всех связанных таблицах):
			// Чтобы при удалении статьи (из таблицы articles) удалялись все дочерние элементы, связки в других таблицах. Не нужно будет удалять отдельно записи об этой статье в других таблицах, всё удалит само. Не нужно дописывать дополнительную логику в контроллерах, база данных выполнит самостоятельно все эти действия.
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tag');
    }
};
