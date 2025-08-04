<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Repositories\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $students;    
    public function __construct(StudentRepositoryInterface $students)
    {
        $this->students = $students;
    }    
    public function index(Request $request)
    {        
        $filters = [];
        if ($request->filled('department')) {
            $filters['department'] = $request->department;
        }        
        $students = $this->students->paginate(10, $filters);
        return view('students.index', compact('students'));
    }    
    public function create()
    {
        return view('students.create');
    }    
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();
        $this->students->create($validated);
        return redirect()->route('students.index')->with('success', 'New student added successfully.');
    }   
    public function show($id)
    {
        $student = $this->students->find($id);
        if (!$student) {
            abort(404);
        }
        return view('students.show', compact('student'));
    }    
    public function edit($id)
    {
        $student = $this->students->find($id);
        if (!$student) {
            abort(404);
        }
        return view('students.edit', compact('student'));
    }    
    public function update(UpdateStudentRequest $request, $id)
    {
        $validated = $request->validated();
        $student = $this->students->update($id, $validated);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }   
    public function destroy($id)
    {
        $this->students->delete($id);
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
