<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'              => env('APP_ADMIN_NAME', 'ideasRepositoryAdministrator'),
                'email'             => env('APP_ADMIN_EMAIL', 'ideasRepositoryAdministrator@ideasrepository.es'),
                'password'          => Hash::make(env('APP_ADMIN_PASSWORD', 'ideasrepository')),
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],[
                'name'              => 'Fernando Leiva',
                'email'             => 'fernando.leiva.brenes@gmail.com',
                'password'          => Hash::make('12345678'),
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
        User::factory(14)->create();
    }
}
