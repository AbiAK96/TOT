<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_id' => $this->faker->word,
        'username' => $this->faker->word,
        'email' => $this->faker->word,
        'password' => $this->faker->word,
        'first_name' => $this->faker->word,
        'last_name' => $this->faker->word,
        'mobile_number' => $this->faker->word,
        'profile_image' => $this->faker->word,
        'city' => $this->faker->word,
        'zip_code' => $this->faker->randomDigitNotNull,
        'is_activated' => $this->faker->word,
        'tfa_enabled' => $this->faker->word,
        'email_verified_at' => $this->faker->randomDigitNotNull,
        'mobile_verified_at' => $this->faker->randomDigitNotNull,
        'role_id' => $this->faker->word,
        'teacher_type_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
