<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->randomTag()
        ];
    }

    public function randomTag()
    {
        return $this->faker->randomElements(['Frontend',
                'Backend',
                'Javascript',
                'CSS3',
                'HTML5',
                'PHP',
                'Python',
                'Vue',
                'Laravel',
                'React',
                'Framework',
                'library',
                'Life',
                'Health',
                'Science'])[0];
    }
}
