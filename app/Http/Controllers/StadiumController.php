<?php

namespace App\Http\Controllers;

use App\Models\Stadium;
use App\Models\Team;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    public function index()
    {
        $stadiums = Stadium::with('team')->get();
        return view('stadiums.index', compact('stadiums'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('stadiums.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'capacity' => 'required|integer|min:0',
            'team_id' => 'nullable|exists:teams,id',
        ]);

        Stadium::create($validatedData);

        return redirect()->route('stadiums.index')->with('success', 'Stadium created successfully.');
    }

    public function show(Stadium $stadium)
    {
        return view('stadiums.show', compact('stadium'));
    }

    public function edit(Stadium $stadium)
    {
        $teams = Team::all();
        return view('stadiums.edit', compact('stadium', 'teams'));
    }

    public function update(Request $request, Stadium $stadium)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'city' => 'required|max:255',
            'capacity' => 'required|integer|min:0',
            'team_id' => 'nullable|exists:teams,id',
        ]);

        $stadium->update($validatedData);

        return redirect()->route('stadiums.index')->with('success', 'Stadium updated successfully.');
    }

    public function destroy(Stadium $stadium)
    {
        $stadium->delete();

        return redirect()->route('stadiums.index')->with('success', 'Stadium deleted successfully.');
    }
}