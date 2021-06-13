<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Jetstream as Jetstream;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'team_id',
        'project_id',
        'order',
        'title',
        'content',
        'access',
    ];

    /**
     * Get the last order of the project's context.
     * 
     * @return null|Project->order
     */
    public function getLastOrder()
    {
        return self::projects()
                    ->where('team_id', $this->team_id)
                    ->where('project_id', $this->id)
                    ->sortByDesc('order')
                    ->first()
                    ->order;
    }

    /**
     * Get the list of all projects which are not archived (deleteable).
     * 
     * @return null|Project->order
     */
    public static function projects(): Collection
    {
        return DB::table('projects')
            ->join('users','projects.user_id','=','users.id')
            ->join('teams','projects.team_id','=','teams.id')
            ->select('projects.*','users.name as userName','users.email as userEmail','teams.name as teamName')
            ->whereNull('deleted_at')
            ->get();
    }
}
