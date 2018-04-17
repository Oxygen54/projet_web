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
}
