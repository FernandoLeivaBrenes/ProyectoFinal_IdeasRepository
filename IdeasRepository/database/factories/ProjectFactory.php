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
        $access = array('public','protected','protected','private','private');
        $team = Team::all()->random();
        $projectUuid = $this->faker->unique()->uuid;

        return [
            'id'         => $projectUuid,
            'user_id'    => $team->allUsers()->random()->id,
            'team_id'    => $team->id,
            'project_id' => $projectUuid,
            'order'      => 1,
            'title'      => $this->faker->unique()->catchPhrase,
            'content'    => $this->faker->realText(4000),
            'access'     => $access[array_rand($access, 1)],
        ];
    }
}
