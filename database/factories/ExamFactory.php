<?php

namespace Database\Factories;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $i=0;
        $i++;
        return [
            'name'=>json_encode([
                'en'=>$this->faker->word(),
                'ar'=>$this->faker->word(),
            ]),
            'desc'=>json_encode([
                'en'=>$this->faker->text(5000),
                'ar'=>$this->faker->text(5000),
            ]),
            'img'=>"exams/$i.png",
            'questions_no'=>15,
            'difficulty'=>$this->faker->numberBetween(1,5),
            'duration_minss'=>$this->faker->numberBetween(1,3)*30,
        ];
    }
    
}
