<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{    
    public function authorize()
    {
        return true;
    }    
    public function rules(): array
    {
        return [            
            'name'          => 'required|string|max:255',
            'student_id'    => 'required|string|max:50|unique:students,student_id',
            'email'         => 'required|email|max:255|unique:students,email',
            'phone'         => 'required|string|max:20',
            'department'    => 'required|string|max:100',
            'year'          => 'required|string|max:20',
            'date_of_birth' => 'nullable|date',
            'address'       => 'nullable|string|max:1000',
            'interests'     => 'nullable|string|max:1000',
        ];
    }
}
