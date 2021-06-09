<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
// use Doctrine\DBAL\Driver\OCI8\ExecutionMode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teamUserToCreate = 30;
        // Total maxTeamUserToCreate = (AllTeams - Admin) * (TeamsCapability = UserCollectionWithOutAdmin - Owner)
        $maxTeamUserToCreate = (Team::all()->count() - 1) * (User::all()->whereNotIn('email', [env('APP_ADMIN_EMAIL', 'ideasRepositoryAdministrator@ideasrepository.es')])->count() - 1);

        for ($i=0; $i < ($teamUserToCreate >= $maxTeamUserToCreate ? $maxTeamUserToCreate : $teamUserToCreate) ; $i++) {

            $user = User::all()->whereNotIn('email', [env('APP_ADMIN_EMAIL', 'ideasRepositoryAdministrator@ideasrepository.es')])->random();
            $team = Team::all()->where('user_id', $user->id)->random();
            $role = ['admin', 'editor' ];// , 'viewer'];

            $switchTeam = 0;
            while ($user->belongsToTeam($team)) {
                if ($switchTeam == 5) {
                    $switchTeam = 0;
                    $team = Team::all()->where('user_id', $user->id)->random();
                }
                $user = User::all()->whereNotIn('email', [env('APP_ADMIN_EMAIL', 'ideasRepositoryAdministrator@ideasrepository.es')])->random();
                $switchTeam++;
            }

            DB::table('team_user')->insert([
                [
                    'team_id'    => $team->id,
                    'user_id'    => $user->id,
                    'role'       => $role[array_rand($role,1)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
