<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Jetstream\Jetstream;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Check user if belongs to a team by id.
     * @param string $teamId 
     * @return bool
     */
    public function belongsToTeamById(string $teamId): bool
    {
        $team = Team::firstWhere('id', $teamId);
        return $this->belongsToTeam($team);
    }

    /**
     * Determine if the user belongs to any team.
     * 
     * @return bool
     */
    public function hasTeams()
    {
        return $this->allTeams()->isNotEmpty();
    }

    /**
     * Get the current team of the user's context.
     */
    public function currentTeam()
    {
        if (is_null($this->current_team_id) && $this->id) {
            $this->switchTeam($this->allTeams()->first());
        }
        return $this->belongsTo(Jetstream::teamModel(), 'current_team_id');
    }

    /**
     * Determine if the given user is in the admin team referee in .env "ROOT USER Email"
     * 
     * @return bool
     */
    public function isAtAdminTeams()
    {
        return $this->belongsToTeam(Team::firstWhere('name', env('APP_ADMIN_TEAM_NAME', "ideasRepositoryAdministrator's Team")));
    }
}
