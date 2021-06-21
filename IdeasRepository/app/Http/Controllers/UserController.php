<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage
     * 
     * @param  Illuminate\Http\Request $request
     * @return  Illuminate\Http\Response
     */
    public function getUser(Request $request)
    {
        try {
            $user = User::firstWhere('id', $request->id);
        } catch (\Throwable $th) {
            $request->session()->flash('error_message', __('User not found'));    
            return redirect(route('admin_dashboard'));
        }
        
        return view('user.EditUser', ['userInfo'=> $user ]);
    }

    /**
     * Store a newly created resource in storage
     * 
     * @param  Illuminate\Http\Request $request
     * @return  Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = new CreateNewUser();
        $user = $newUser->create($request->all());

        $request->session()->flash('success_message', __('You have created the user').' : '.$user->name);
        return redirect(route('admin_dashboard'));
    }

    /**
     * Edit a user profile info
     * 
     * @param  Illuminate\Http\Request $request
     * @return  Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $newUser = new UpdateUserProfileInformation();

        $user = User::firstWhere('id', $request->id);

        $user = $newUser->update($user, $request->all());

        $request->session()->flash('success_message', __('User updated'));
        return redirect(route('admin_dashboard'));
    }
}
