<?php

namespace Database\Factories;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
	protected $model = Article::class;

	public function definition() {
		// Конструкция преобразует текст, регистр и добавляет тире:
		$title = $this->faker->sentence(6, true);
		$slug =  Str::substr(Str::lower(preg_replace('/\s+/', '-', $title )), 0, -1);

		// "Hello wold hello wold hello wold."
		// "hello-wold-hello-wold-hello-wold"
		// https://laravel.com/docs/8.x/helpers

		return [
			'title' => $title,
			// Создать рандомный текст состоящий из 100 предложений:
			'body' => $this->faker->paragraph(100, true),
			'slug' => $slug,
			// Для вывода изображений выбран сайт placeholder.com:
			'img' => 'https://via.placeholder.com/600/5F113B/FFFFFF/?text=LARAVEL:8.*',
			'created_at' => $this->faker->dateTimeBetween('-1 years'),	// Отступ на 1 год, Чтобы все комментарии были созданы в разное время
			'published_at' => Carbon::now()
		];
	}
}
