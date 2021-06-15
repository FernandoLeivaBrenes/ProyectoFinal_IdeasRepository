<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Provider\Uuid;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'id'            => Uuid::uuid(),
                'name'          => env('APP_ADMIN_TEAM_NAME', 'ideasRepositoryAdministrator\'s Team'),
                'user_id'       => User::firstWhere('email', env('APP_ADMIN_EMAIL', 'ideasRepositoryAdministrator@ideasrepository.es'))->id,
                'personal_team' => true,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]
        ]);

        foreach (User::all()->whereNotIn('email', [env('APP_ADMIN_EMAIL', 'ideasRepositoryAdministrator@ideasrepository.es')]) as $user) {
            DB::table('teams')->insert([
                [
                    'id'            => Uuid::uuid(),
                    'name'          => $user->name.'\'s team',
                    'user_id'       => $user->id,
                    'personal_team' => $user->hasTeams() ? false : true,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
            ]);
        };

        Team::factory(15)->create();
    }
}
