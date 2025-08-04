<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClubRequest;
use App\Http\Requests\UpdateClubRequest;


class ClubController extends Controller
{    
    public function index(Request $request)
    {        
        $query = Club::query();
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        $clubs = $query->orderBy('name')->paginate(10);
        return view('clubs.index', compact('clubs'));
    } 
    public function create()
    {
        return view('clubs.create');
    }
    public function store(StoreClubRequest $request)
    {
        $club = Club::create($request->validated());
    }
    public function show($id)
    {
        $club = Club::with('students')->findOrFail($id);
        return view('clubs.show', compact('club'));
    }
    public function edit(Club $club)
    {
        return view('clubs.edit', compact('club'));
    }
    public function update(UpdateClubRequest $request, Club $club)
    {
        $club->update($request->validated());    
    }
    public function destroy(Club $club)
    {      
        $club->delete();
        return redirect()->route('clubs.index')->with('success', 'Club deleted successfully.');
    }
}
