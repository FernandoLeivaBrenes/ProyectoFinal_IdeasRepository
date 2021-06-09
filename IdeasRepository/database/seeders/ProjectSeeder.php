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
        Project::factory(500)->create();

        foreach (Project::all()->unique('team_id')->sortBy('team_id') as $projectCollection) {
            $team = Project::all()->where('team_id', $projectCollection->team_id)->sortBy('team_id');
            foreach ($team as $projectByTeam) {
                if( $team->count() != 1 && $team->first() != $projectByTeam ) {                    
                    DB::table('projects')
                    ->where('id', $projectByTeam->id)
                    ->update([
                        'project_id' => $projectCollection->id,
                        'order'      => $projectByTeam->getLastOrder()+1,
                        'access'     => $projectCollection->access,
                    ]);
                }
            }
        }
    }
}
