<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Difficulty;
use App\Models\Lesson;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $this->authorize('viewIndex', Lesson::class); */
        $lessons = Lesson::all();
        return view("lessons.index", ['lessons' => $lessons]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $difficulties = Difficulty::all();
        return view("lessons.create", ['difficulties' => $difficulties ] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        $lesson = new Lesson(
            [
                "title" => $request->title,
                "description" => $request->description,
                "difficulty_id" => $request->difficulty
            ]
        );

        $lesson->save();

        return back()->with("success", "Lesson created successfully.");

    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        $this->authorize('view', $lesson);
        return view('lessons.show', ['lesson' => $lesson]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        $difficulties = Difficulty::all();
        return view("lessons.edit", ['lesson' => $lesson, 'difficulties' => $difficulties ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        //$lesson->update($request->all);
        $lesson->update([
            'title' => $request->title,
            'description' => $request->description,
            'difficulty_id' => $request->difficulty
        ]);

        return redirect()->route('lessons.index')->with('success', 'The lesson was updated successfully.');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return back()->with('success', 'Successfully deleted the lesson: ' . $lesson->title . '.');
    }

    /* Saját funkciók */
    public function show_deleted()
    {
        $deleted_lessons = Lesson::onlyTrashed()->get();
        return view('lessons.show_deleted', ['lessons' => $deleted_lessons]);
    }

    public function restore(Lesson $lesson)
    {
        $lesson->restore();
        return back()->with('success', '' . $lesson->title . ' was successfully restored.');
    }

    public function show_lessons(Lesson $lesson) {

        // A kurzushoz tartozó leckék lekérése
        /* $course = Course::with('lessons')->find($course_id); */
        $lessons = $lesson->lessons;

        if (count($lessons) == 0) {
            return view('lessons.no_lessons');
        }
        return view ('lessons.show_lessons', ['lessons' => $lessons]);
    }


}

