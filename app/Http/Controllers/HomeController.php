<?php

namespace App\Http\Controllers;

use App\Models\Difficulty;
use App\Models\Lesson;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lessons = Lesson::all();
        $difficulty = Difficulty::all();

        return view('home', ['lessons' => $lessons, 'difficulty_id' => $difficulty ]);
    }


    public function show()
    {
        $lessons = Lesson::all();
        $this->authorize('view', $lessons);
        return view('lessons.show', ['lesson' => $lessons]);
    }
}
