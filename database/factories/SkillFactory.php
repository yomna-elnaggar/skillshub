<?php

namespace Database\Factories;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   static $i=0;
        $i++;
        return [
            'name'=>json_encode([
                'en'=>$this->faker->word(),
                'ar'=>$this->faker->word(),
            ]),
            'img'=>"skills/$i.png"
        ];
    }
}
