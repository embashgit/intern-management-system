<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Staff;
use Auth;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $users = User::all();
        $userprojects = Auth::user()->ptojects;
        $projects = project::with('User')->get()->random(2);
        $stafff = Staff::all();
        return view('home', compact('projects','userprojects','users', 'stafff'));
    }
}
