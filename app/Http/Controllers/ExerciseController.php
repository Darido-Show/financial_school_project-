<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use App\Models\Exercise;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* $this->authorize('viewIndex', Exercise::class); */
        $exercises = Exercise::all();
        return view("exercises.index", ['exercises' => $exercises]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("exercises.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExerciseRequest $request)
    {
        $exercise = new Exercise(
            [
                "name" => $request->name,
                "question_id"=> $request->question_id,
                "lesson_id" => $request->lesson_id
            ]
        );
            $exercise->save();

        return back()->with("success", "exercise created successfully.");

    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        $this->authorize('view', $exercise);
        return view('exercises.show', ['exercise' => $exercise]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercise)
    {
        return view("exercises.edit", ['exercise' => $exercise]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseRequest $request, Exercise $exercise)
    {
        $exercise->update($request->all());

        return redirect()->route('exercises.index')->with('success', 'The exercise was updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return back()->with('success', 'Successfully deleted the course: ' . $exercise->name . '.');
    }

    /* Saját funkciók */
    public function show_deleted()
    {
        $deleted_exercises = Exercise::onlyTrashed()->get();
        return view('exercises.show_deleted', ['exercises' => $deleted_exercises]);
    }

    public function restore(Exercise $exercise)
    {
        $exercise->restore();
        return back()->with('success', '' . $exercise->name . ' was successfully restored.');
    }

}
