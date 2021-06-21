<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory(600)->create();

        foreach (Project::all()->unique('team_id')->sortBy('team_id') as $projectUniqueCollection) {
            // Collection of projects in the same Team
            $projectsCollectionByTeamId = Project::all()->where('team_id', $projectUniqueCollection->team_id)->sortBy('team_id')->keyBy('id');
            
            foreach ($projectsCollectionByTeamId as $projectByTeam) {
                $randomProject = $projectsCollectionByTeamId->random();
                if ($randomProject->id != $projectByTeam->id) {
                    $projectsCollectionByTeamId->pull($projectByTeam->id);
                    DB::table('projects')
                        ->where('id', $projectByTeam->id)
                        ->update([
                            'project_id' => $randomProject->id,
                            'order'      => $randomProject->getLastOrder() >= 1 ? $randomProject->getLastOrder()+1 : $randomProject->getLastOrder(),
                            'access'     => $randomProject->access,
                        ]);
                }
            }
        }
    }
}
