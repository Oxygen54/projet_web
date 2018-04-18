<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;


class HomeController extends Controller
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
        $users = User::orderBy('created_at', 'desc')->get();
        return view('management', ['users' => $users]);
    }

    public function DeleteUser($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
        return redirect()->route('management');
    }

    public function EditUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:10',
            'email' => 'required|max:320',
            'rank' => 'required|max:1'
        ]);
        $user = User::find($request['userId']);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->rank = $request['rank'];
        $user->updated_at = date('Y-m-d H:i:s');

        $user->update();

        return redirect()->route('management');
    }
}
