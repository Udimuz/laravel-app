<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\State>
 */
class StateFactory extends Factory
{
	protected $model = State::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
	public function definition() {
		// Статистика также имеет 2 поля, лайки и просмотры:
		return [
			// Функция numberBetween() принимает минимальное и максимальное значение. И выдаёт случайное значение, между:
			'likes' => $this->faker->numberBetween($min=1, $max=20),
			// Чтобы не было ситуации, что у нас лайков больше чем просмотров, указать значения в другом, большем промежутке:
			'views' => $this->faker->numberBetween($min=21, $max=100),
		];
	}
}
