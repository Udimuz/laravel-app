<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
	protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
	public function definition()
	{
		// фабрика Комментариев имеет всего 2 поля:
		return [
			// Фраза состоящая из 3-х слов:
			'subject' => $this->faker->sentence('3'),
			// Текст из 3-х предложений:
			'body' => $this->faker->paragraph('3', false),
		];
	}
}
