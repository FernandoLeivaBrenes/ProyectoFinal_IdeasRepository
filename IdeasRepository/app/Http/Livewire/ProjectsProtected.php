<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ProjectController;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsProtected extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.projects-protected');
    }

    /**
     * Delete a project in the app.
     * @param $projectId id del proyecto.
     */
    public function intoTrash($projectId){
        session()->flash('message', ProjectController::destroy($projectId));
    }

    /**
     * Get a project to be visualized.
     */
    public static function getOneProject(int $projectId){
        $projectController = new ProjectController();
        $project = $projectController->show($projectId);
        return view('livewire.project-create')->with('project', $project);
    }
}
