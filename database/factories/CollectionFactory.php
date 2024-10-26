<?php

namespace Database\Factories;

use App\Helpers\UserHelper;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Collection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomUserId = UserHelper::getRandomUserId();


        return [
            'name' => $this->faker->word,
            'goal_amount' => $this->faker->numberBetween(1000, 10000),
            'current_amount' => 0,
            'end_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'user_id' => $randomUserId
        ];
    }
}
