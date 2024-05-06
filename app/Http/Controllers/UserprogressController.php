<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserprogressRequest;
use App\Http\Requests\UpdateUserprogressRequest;
use App\Models\Userprogress;

class UserprogressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewIndex', Userprogress::class);
        $userprogresses = Userprogress::all();
        return view("userprogresses.index", ['userprogresses' => $userprogresses]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("userprogresses.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserprogressRequest $request)
    {
        $userprogress = new Userprogress(
            [
                "name" => $request->name,
                "description" => $request->description
            ]
        );

        $userprogress->save();

        return back()->with("success", "userprogress created successfully.");

    }

    /**
     * Display the specified resource.
     */
    public function show(Userprogress $userprogress)
    {
        $this->authorize('view', $userprogress);
        return view('userprogresses.show', ['userprogress' => $userprogress]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Userprogress $userprogress)
    {
        return view("lesuserprogresses.edit", ['userprogress' => $userprogress]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserprogressRequest $request, Userprogress $userprogress)
    {
        $userprogress->update($request->all());

        return redirect()->route('userprogresses.index')->with('success', 'The userprogress was updated successfully.');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Userprogress $userprogress)
    {
        $userprogress->delete();
        return back()->with('success', 'Successfully deleted the course: ' . $userprogress->name . '.');
    }

    /* Saját funkciók */
    public function show_deleted()
    {
        $deleted_userprogresses = Userprogress::onlyTrashed()->get();
        return view('lessons.show_deleted', ['lessons' => $deleted_userprogresses]);
    }

    public function restore(Userprogress $userprogress)
    {
        $userprogress->restore();
        return back()->with('success', '' . $userprogress->name . ' was successfully restored.');
    }
}
