<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Team;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::with('team')->get();
        return view('coaches.index', compact('coaches'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('coaches.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'birth_date' => 'required|date',
            'team_id' => 'required|exists:teams,id',
        ]);

        Coach::create($validatedData);

        return redirect()->route('coaches.index')->with('success', 'Coach created successfully.');
    }

    public function show(Coach $coach)
    {
        return view('coaches.show', compact('coach'));
    }

    public function edit(Coach $coach)
    {
        $teams = Team::all();
        return view('coaches.edit', compact('coach', 'teams'));
    }

    public function update(Request $request, Coach $coach)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'birth_date' => 'required|date',
            'team_id' => 'required|exists:teams,id',
        ]);

        $coach->update($validatedData);

        return redirect()->route('coaches.index')->with('success', 'Coach updated successfully.');
    }

    public function destroy(Coach $coach)
    {
        $coach->delete();

        return redirect()->route('coaches.index')->with('success', 'Coach deleted successfully.');
    }
}