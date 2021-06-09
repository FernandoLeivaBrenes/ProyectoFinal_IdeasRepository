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
     * Get the current owner of the project's context.
     * 
     * @return Project->user_id
     */
    public function owner(): int
    {
        return $this->belongsTo(Jetstream::userModel(), 'user_id')->id;
    }

    /**
     * Get the current team which owns the project's context.
     * 
     * @return Project->team_id
     */
    public function teamOwner(): string
    {
        return $this->belongsTo(Jetstream::teamModel(), 'team_id')->id;
    }

    /**
     * Get the reference of the main project of the project's context.
     * 
     * @return null|Project->id
     */
    public function projectReference(): ?int
    {
        return $this->hasRootProject() ? $this->belongsTo(Project::class, 'project_id')->id : null;
    }

    /**
     * Get the reference of the main project of the project's context.
     * 
     * @return bool
     */
    public function hasRootProject(): bool
    {
        return (! $this->belongsTo(Project::class, 'project_id')) ? true : false;
    }

    /**
     * Get the last order of the project's context.
     * 
     * @return null|Project->order
     */
    public function getLastOrder()
    {
        return $this->all()
                    ->where('team_id', $this->team_id)
                    ->sortByDesc('order')
                    ->first()
                    ->order;
    }

    /**
     * Get the list of all projects.
     * 
     * @return null|Project->order
     */
    public static function projectById(int $id): Collection
    {
        return self::projects()->where('id', $id);
    }

    /**
     * Get the list of all projects.
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
