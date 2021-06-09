<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $input = array('public','protected','protected','private','private');
        $team = Team::all()->random();
        return [
            'user_id'    => $team->allUsers()->random()->id,
            'team_id'    => $team->id,
            'project_id' => null,
            'order'      => 1,
            'title'      => $this->faker->unique()->catchPhrase,
            'content'    => $this->faker->realText(1020),
            'access'     => $input[array_rand($input, 1)],
        ];
    }
}
