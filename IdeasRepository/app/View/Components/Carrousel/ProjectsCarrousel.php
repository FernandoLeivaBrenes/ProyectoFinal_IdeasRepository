<?php

namespace App\View\Components\Carrousel;

use App\Http\Controllers\ProjectController;
use Illuminate\View\Component;

class ProjectsCarrousel extends Component
{
    public $projectCollection;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->projectCollection = ProjectController::publicCollection_5();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carrousel.projects-carrousel', ['projectCollection' => $this->projectCollection]);
    }
}
