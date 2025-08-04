<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMembershipRequest;

class ClubMembershipController extends Controller
{    
    public function index(Request $request)
    {
        if ($request->has('club')) {            
            $club = Club::findOrFail($request->club);            
            $members = $club->students()->orderBy('name')->paginate(10);
            return view('club_student.index', compact('club', 'members'));
        } else {            
            $memberships = \DB::table('club_student')
                ->join('students', 'club_student.student_id', '=', 'students.id')
                ->join('clubs', 'club_student.club_id', '=', 'clubs.id')
                ->select(
                    'students.name as student_name',
                    'students.email',
                    'clubs.name as club_name',
                    'clubs.type as type',
                    'club_student.created_at as joined_at'
                )
                ->orderBy('clubs.name')
                ->orderBy('students.name')
                ->paginate(15);

            return view('club_student.index', compact('memberships'));
        }
    }    
    public function create()
    {
        $clubs = Club::orderBy('name')->get();
        $students = Student::orderBy('name')->get();
        return view('club_student.create', compact('clubs', 'students'));
    }    
    public function store(StoreMembershipRequest $request)
    {
        $validated = $request->validated();
        $club = Club::findOrFail($validated['club_id']);        
        if ($club->students()->where('students.id', $validated['student_id'])->exists()) {
            return redirect()->back()->withErrors('Student is already a member of this club.');
        }        
        $club->students()->attach($validated['student_id']);
        return redirect()
            ->route('clubs.members.index', ['club' => $club->id])
            ->with('success', 'Student added to club successfully.');
    }    
    public function destroy(Club $club, Student $student)
    {
        $club->students()->detach($student->id);

        return redirect()
            ->route('clubs.members.index', ['club' => $club->id])
            ->with('success', 'Student removed from club.');
    }
    public function allMemberships()
    {
        $memberships = \DB::table('club_student')
            ->join('students', 'club_student.student_id', '=', 'students.id')
            ->join('clubs', 'club_student.club_id', '=', 'clubs.id')
            ->select(
                'students.name as student_name',
                'students.email',
                'clubs.name as club_name',
                'clubs.type as type',
                'club_student.created_at as joined_at'
            )
            ->orderBy('clubs.name')
            ->orderBy('students.name')
            ->paginate(15);

        return view('club_student.index', compact('memberships'));
    }
}
