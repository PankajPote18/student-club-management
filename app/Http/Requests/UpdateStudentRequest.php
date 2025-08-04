<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{    
    public function authorize()
    {
        return true;
    }    
    public function rules(): array
    {
        $student = $this->route('student');
        $studentId = is_object($student) ? $student->id : $student;
        return [
            'name'          => 'required|string|max:255',
            'student_id'    => 'required|string|max:50|unique:students,student_id,' . $studentId,
            'email'         => 'required|email|max:255|unique:students,email,' . $studentId,
            'phone'         => 'required|string|max:20',
            'department'    => 'required|string|max:100',
            'year'          => 'required|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address'       => 'nullable|string|max:1000',
            'interests'     => 'nullable|string|max:1000',
        ];
    }
}
