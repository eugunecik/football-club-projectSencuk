<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\Stadium;
use Illuminate\Http\Request;

class FootballMatchController extends Controller
{
    public function index()
    {
        $matches = FootballMatch::with(['homeTeam', 'awayTeam', 'stadium'])->get();
        return view('matches.index', compact('matches'));
    }

    public function create()
    {
        $teams = Team::all();
        $stadiums = Stadium::all();
        return view('matches.create', compact('teams', 'stadiums'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id|different:home_team_id',
            'stadium_id' => 'required|exists:stadiums,id',
            'match_date' => 'required|date',
            'home_team_score' => 'nullable|integer|min:0',
            'away_team_score' => 'nullable|integer|min:0',
        ]);

        FootballMatch::create($validatedData);

        return redirect()->route('matches.index')->with('success', 'Match created successfully.');
    }

    public function show(FootballMatch $match)
    {
        return view('matches.show', compact('match'));
    }

    public function edit(FootballMatch $match)
    {
        $teams = Team::all();
        $stadiums = Stadium::all();
        return view('matches.edit', compact('match', 'teams', 'stadiums'));
    }

    public function update(Request $request, FootballMatch $match)
    {
        $validatedData = $request->validate([
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id|different:home_team_id',
            'stadium_id' => 'required|exists:stadiums,id',
            'match_date' => 'required|date',
            'home_team_score' => 'nullable|integer|min:0',
            'away_team_score' => 'nullable|integer|min:0',
        ]);

        $match->update($validatedData);

        return redirect()->route('matches.index')->with('success', 'Match updated successfully.');
    }

    public function destroy(FootballMatch $match)
    {
        $match->delete();

        return redirect()->route('matches.index')->with('success', 'Match deleted successfully.');
    }
}