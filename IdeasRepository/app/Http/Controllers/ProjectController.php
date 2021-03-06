<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

use function PHPUnit\Framework\isEmpty;

class ProjectController extends Controller
{
    /**
     * Transform a large string into a little one (def 50 words).
     *
     * @param string inputString
     * @param int words
     * @return String
     */
    private static function firstWords( string $inputString, int $words = 50 ): String
    {
        // Array = [ key@wordStarts => value@wordItslef ]
        $wordPosition = str_word_count($inputString, 2);
        $length = min($words, count($wordPosition));
        
        // Select position from array keys (the Key=>Value contains key@autoincrement=>value@wordCharacterStartPosition)
        $arrPositionKey = array_keys($wordPosition)[$length+4];
        
        return substr($inputString, 0, $arrPositionKey).($length == $words ? ' ...': '');
    }

    /**
     * Display a listing of 6 random public projects.
     *
     * @return \Illuminate\Http\Response
     */
    public static function publicCollection_6(): Response
    {
        try {
            $projectCollection = Project::notDeletedProjects()
                        ->where('order', 1 )
                        ->where('access','public')
                        ->random(6);        

            foreach ($projectCollection as $item) {
                $item->content = self::firstWords($item->content);
            }
                            
            return response($projectCollection, 200);

        } catch (\Throwable $th) {
            return response(['message'=>'There are NO public projects.'], 204);
        }
    }

    /**
     * Get all but the private ones
     *
     * @return Illuminate\Support\Collection
     */
    public static function authenticatedList(): Collection
    {
        $projects = Project::notDeletedProjects()
                    ->where('access','!=','private')
                    ->sortByDesc('updated_at');

        return $projects;
    }

    /**
     * Display a listing of application visible's resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function listByUser(User $user): Response
    {
        $projects = self::authenticatedList();

        $projects = $projects->concat(
            self::projectsByUser($user,['private'])
        );

        foreach ($projects as $item) {
            $item->content = self::firstWords($item->content, 100);
        }

        return response($projects->sortBy('created_at'), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id'    => 'required|integer',
            'team_id'    => 'required|uuid|min:25',
            'project_id' => 'required|uuid|integer',
            'order'      => 'integer|gt:0',
            'title'      => 'required|string|unique:projects|min:2|max:180',
            'content'    => 'required|string|min:10|max:8000',
        ]);
        #dd($request->all());

        Project::create($request->all());
        // $project = Project::create($request->all());

        // $response = array([
        //     'response' => false, 
        //     'message' => __('That project doesn\'t exist')
        // ],404);
        
        // return response()->json($project,$response[1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(int $projectId)
    {
        if (!isEmpty($project = Project::find($projectId))) {
            return $project;
        }
        return response()->json(null, 204,['error', 'Project not found']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

        return response()->json($project,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    #public function destroy(Project $project)
    public static function destroy(int $projectId)
    {
        if ($project = Project::find($projectId)){
            $project->delete();
            return __('Project was send to the trash.') ;
        }
        
        return __('That project doesn\'t exist');
    }

    /**
     * Display a listing of projects whose user is working with.
     *
     * @param Users $userId User
     * @param array $types Array with the typed project by access, all types by all.
     * 
     * @return \Illuminate\Http\Response
     */
    private static function projectsByUser(User $user, array $types = ['public','protected','private'])
    {
        $projects = new Collection();
        
        $teams = $user->allTeams()->toArray();
        $teamsArray = [];
        foreach ($teams as $key) {
            array_push($teamsArray, $key['id']);
        }

        $projectsBag = Project::notDeletedProjects()->whereIn('team_id',$teamsArray);

        foreach ($projectsBag as $project) {
            foreach ($types as $type){
                if ($project->user_id == $user->id && $project->access == $type && $project->project_id == null){
                    $projects = $projects->push($project);
                }        
            }   
        }

        return $projects;
    }

    // /**
    //  * Get user can access of the project's context.
    //  * 
    //  * @param User $user
    //  * 
    //  * @return bool
    //  */
    // private function hasAccess(User $user): bool
    // {
    //     if ( $user-> ) {

    //     }

    //     return true;
    // }

    // /**
    //  * Change the access type in main project's context.
    //  * 
    //  * @param String $type
    //  * 
    //  * @return void
    //  */
    // private function manageAccess(string $type): void
    // {
    //    if (array_search($type, $this->access, true)) {
    //        $this->has
    //    }
    // }
}
