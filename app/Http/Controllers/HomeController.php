<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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


    public function gestion()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('gestion', ['users' => $users]);
    }
}
