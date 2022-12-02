<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

		// Создать 10 тегов, и эту коллекцию присвоить переменной $tags:
		$tags = \App\Models\Tag::factory(10)->create();

		// Создать 20 статей, и эту коллекцию присвоить переменной $articles:
		$articles = \App\Models\Article::factory(20)->create();

		//Проходит по всем элементам коллекции и сохраняет массив значения данных полей, все айдишники всех тегов в массив:
		$tags_id = $tags->pluck('id');		// https://laravel.com/docs/8.x/collections#method-pluck

		// В цикле проходим по коллекции статей:
		$articles->each(function ($article) use ($tags_id) {
			// Для каждой статьи:
			// Мы, используя связь "article->tags" которую мы прописали в наших моделях, заполняем сводную таблицу 3-мя рандомными тегами
			$article->tags()->attach($tags_id->random(3));
			// Создаём 3 комментария:	Используем 'article_id' каждой конкретной статьи
			\App\Models\Comment::factory(3)->create(['article_id' => $article->id]);
			// Создаём 1 элемент статистики:	также используя 'article_id'
			\App\Models\State::factory(1)->create(['article_id' => $article->id]);
		});
		// В итоге у нас получится 10 тегов, 20 статей. Для каждой статьи будет связь с 3-мя тегами, будет 3 комментария, и 1 набор статистических данных
    }
}
