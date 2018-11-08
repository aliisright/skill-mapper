<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Level;

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
    {
        $skills = Skill::all();
        $levels = Level::all();
        return view('home', ['skills' => $skills, 'levels' => $levels]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function skills()
    {
        $skills = Skill::all();
        $levels = Level::all();
        return view('skills', ['skills' => $skills, 'levels' => $levels]);
    }
}
