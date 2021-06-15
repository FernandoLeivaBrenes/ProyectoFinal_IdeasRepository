<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of 5 public projects.
     *
     * @return \Illuminate\Http\Response
     */
    public static function publicCollection_5(): String
    {
        $projectCollection = Project::notDeletedProjects()
                        ->where('order', 1 )
                        ->where('access','public')
                        ->sortBy('created_at')
                        ->splice(0,5);
                        
        return $projectCollection->isEmpty() ? 
                response(['message'=>'There are NO public projects.'], 204)
                : response()->json([$projectCollection], 200) ;
                // : $projectCollection ;
    }
}
