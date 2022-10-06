<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users_id = User::pluck('id')->toArray();
        return [
            'title'=> $this->faker->sentence(),
            'user_id'=>Arr::random($users_id),
            'tags'=> 'laravel,api,backend',
            'company'=>$this->faker->company(),
            'email'=>$this->faker->companyEmail(),
            'website'=>$this->faker->url(),
            'location'=>$this->faker->city(),
            'description'=>$this->faker->paragraph(5),
        ];
    }
}
