<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function management()
    {

        // Get all the users from DB
        $users = User::orderBy('created_at', 'desc')->get();

        // Return view
        return view('management', ['users' => $users]);
    }

    public function DeleteUser($user_id)
    {
        // Find the user thanks to the ID
        $user = User::find($user_id);

        // Delete it
        $user->delete();

        // Return view
        return redirect()->route('management');
    }

    public function EditUser(Request $request)
    {

        // Check required values
        $this->validate($request, [
            'name' => 'required|max:10',
            'email' => 'required|max:320',
            'rank' => 'required|max:1'
        ]);

        // Find the user thanks to the ID
        $user = User::find($request['userId']);

        // Set the values
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->rank = $request['rank'];
        $user->updated_at = date('Y-m-d H:i:s');

        // Update the user with new values
        $user->update();

        // Return view
        return redirect()->route('management');
    }
}
