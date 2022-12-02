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
		Schema::create('comments', function (Blueprint $table) {
			$table->id();
			$table->string('subject');	// Поле для заголовка
			$table->text('body');	// Поле для текста комментария
			//$table->unsignedBigInteger('article_id');	//	Ссылка на статистику
			// для связки с другими таблицами (чтобы грамотно удаляло записи  во всех связанных таблицах) лучше использовать способ ниже:
			// Чтобы при удалении статьи (из таблицы articles) удалялись все дочерние элементы, связки в других таблицах. Не нужно будет удалять отдельно записи об этой статье в других таблицах, всё удалит само. Не нужно дописывать дополнительную логику в контроллерах, база данных выполнит самостоятельно все эти действия.
			$table->foreignId('article_id')->constrained()->onDelete('cascade');
			$table->timestamps();
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
