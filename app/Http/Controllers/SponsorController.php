<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\Team;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::with('teams')->get();
        return view('sponsors.index', compact('sponsors'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('sponsors.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'industry' => 'required|max:255',
            'teams' => 'array',
            'teams.*' => 'exists:teams,id',
            'contract_start' => 'required|array',
            'contract_start.*' => 'date',
            'contract_end' => 'required|array',
            'contract_end.*' => 'date|after:contract_start.*',
        ]);

        $sponsor = Sponsor::create($validatedData);

        if (isset($validatedData['teams'])) {
            foreach ($validatedData['teams'] as $key => $teamId) {
                $sponsor->teams()->attach($teamId, [
                    'contract_start' => $validatedData['contract_start'][$key],
                    'contract_end' => $validatedData['contract_end'][$key],
                ]);
            }
        }

        return redirect()->route('sponsors.index')->with('success', 'Sponsor created successfully.');
    }

    public function show(Sponsor $sponsor)
    {
        return view('sponsors.show', compact('sponsor'));
    }

    public function edit(Sponsor $sponsor)
    {
        $teams = Team::all();
        return view('sponsors.edit', compact('sponsor', 'teams'));
    }

    public function update(Request $request, Sponsor $sponsor)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'industry' => 'required|max:255',
            'teams' => 'array',
            'teams.*' => 'exists:teams,id',
            'contract_start' => 'required|array',
            'contract_start.*' => 'date',
            'contract_end' => 'required|array',
            'contract_end.*' => 'date|after:contract_start.*',
        ]);

        $sponsor->update($validatedData);

        $sponsor->teams()->detach();

        if (isset($validatedData['teams'])) {
            foreach ($validatedData['teams'] as $key => $teamId) {
                $sponsor->teams()->attach($teamId, [
                    'contract_start' => $validatedData['contract_start'][$key],
                    'contract_end' => $validatedData['contract_end'][$key],
                ]);
            }
        }

        return redirect()->route('sponsors.index')->with('success', 'Sponsor updated successfully.');
    }

    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();

        return redirect()->route('sponsors.index')->with('success', 'Sponsor deleted successfully.');
    }
}