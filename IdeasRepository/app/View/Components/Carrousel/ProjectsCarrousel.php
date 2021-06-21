<?php

namespace App\View\Components\Carrousel;

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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
        if (Request::route()->getName() != 'dashboard' ) {
            $this->projectCollection = ProjectController::publicCollection_6();
        }else{
            $this->projectCollection = ProjectController::listByUser(Auth::user());    
        }
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
